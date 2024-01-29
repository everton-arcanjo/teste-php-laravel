<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Document;
use App\Models\Category;

class ProcessDocuments implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $documentData;

    public function __construct($documentData)
    {
        $this->documentData = $documentData;
    }

    public function handle()
    {
        if (isset($this->documentData['categoria'], $this->documentData['titulo'], $this->documentData['conteúdo'])) {

            $category = Category::firstOrCreate(['name' => $this->documentData['categoria']]);
            $category_id = $category->id;

            $document = Document::create([
                'category_id' => $category->id,
                'title' => 'Título do Documento',
                'conteudo' => 'Conteúdo do Documento',
            ]);

            return $document->id;
        }

        return null;
    }
}