<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Category;
use App\Jobs\ProcessDocuments;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;

class DocumentController extends Controller
{
    public function importForm()
    {
        return view('import.form');
    }

    public function addToQueue(Request $request)
    {$isConnected = Redis::ping();

        $request->validate([
            'file' => 'required|mimes:json|max:10240',
        ]);

        $jsonFile = $request->file('file');
        $jsonContent = json_decode(file_get_contents($jsonFile->path()), true);

        if (isset($jsonContent['documentos']) && is_array($jsonContent['documentos'])) {

            $this->dispatchToQueue($jsonContent['documentos']);

            return view('import.import-list', ['importedRecords' => $jsonContent['documentos']]);
        }

        return view('import.import-list', ['importedRecords' => []]);
    }

    private function dispatchToQueue(array $documents)
    {
        foreach ($documents as $document) {
            Redis::connection()->rpush('import_queue', json_encode($document));
        }
    }

    public function showImportForm()
    {
        return view('import.form');
    }

    public function showDocuments()
    {
        $documents = Document::with('category')->get();
        return view('documents.index', compact('documents'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:json|max:10240',
        ]);

        $jsonFile = $request->file('file');
        $jsonContent = json_decode(file_get_contents($jsonFile->path()), true);

        if (isset($jsonContent['documentos']) && is_array($jsonContent['documentos'])) {

            $this->dispatchToQueue($jsonContent['documentos']);
            return redirect()->route('import.form')->with('success', 'Importação adicionada à fila com sucesso!');
        }

        return redirect()->route('import.form')->with('error', 'Formato de arquivo JSON inválido.');
    }

    public function processAllFromQueue(Request $request)
    {
        $redisKey = 'import_queue';
        
        while ($jsonContent = Redis::connection()->lpop($redisKey)) {
            $documentData = json_decode($jsonContent, true);

            $category = Category::firstOrCreate(['name' => $documentData['categoria']]);
            $category_id = $category->id;

            Document::create([
                'category_id' => $category_id,
                'title' => $documentData['titulo'],
                'contents' => $documentData['conteúdo'],
            ]);
        }

        return view('import.import-success');
    }   
}
