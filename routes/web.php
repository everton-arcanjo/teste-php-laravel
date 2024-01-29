<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('import.form');
});

Route::get('/import/form', [DocumentController::class, 'showImportForm'])->name('import.form');
Route::post('/import/add-to-queue', [DocumentController::class, 'addToQueue'])->name('import.addToQueue');
Route::post('/import/process-all', [DocumentController::class, 'processAllFromQueue'])->name('import.processAllFromQueue');
Route::get('/import/success', [DocumentController::class, 'importSuccess'])->name('import.success');
Route::get('/documents', [DocumentController::class, 'showDocuments'])->name('documents.index');



