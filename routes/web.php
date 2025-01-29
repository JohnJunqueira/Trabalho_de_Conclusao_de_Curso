<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfertaController;

Route::get('/', function () {
    return view('welcome');
});

//Rotas Cliente

//Chamando rotas MSFLIX organizadas
foreach(File::allFiles(__DIR__.'/web') as $route_file){
   require $route_file->getPathname();
}


//Ofertas
Route::prefix('ofertas')->group(function () {
    Route::get('/index', [OfertaController::class, 'index'])->middleware(['auth'])->name('ofertas.index');
    Route::get('/create', [OfertaController::class, 'create'])->middleware(['auth'])->name('ofertas.create');
    Route::post('/store', [OfertaController::class, 'store'])->middleware(['auth'])->name('ofertas.store');
    Route::get('/show/{id}',[OfertaController::class,'show'])->middleware(['auth'])->name('ofertas.show');
    Route::get('/edit/{id}', [OfertaController::class, 'edit'])->middleware(['auth'])->name('ofertas.edit');
    Route::post('/update/{id}', [OfertaController::class, 'update'])->middleware(['auth'])->name('ofertas.update');
    Route::delete('/delete/{id}', [OfertaController::class, 'destroy'])->middleware(['auth'])->name('ofertas.delete');
});

require __DIR__.'/auth.php';



