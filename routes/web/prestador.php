<?php

use App\Http\Controllers\Backend\PrestadorController;
use App\Http\Controllers\ServicoController;
use Illuminate\Support\Facades\Route;


//Rota prestador
Route::get('prestador/dashboard', [PrestadorController::class, 'dashboard'])
->middleware(['auth', 'prestador'])
->name('prestador.dashboard');

//Serviços
Route::prefix('servicos')->group(function () {
    Route::get('/index', [ServicoController::class, 'index'])->middleware(['auth'])->name('servicos.index');
    Route::get('/create', [ServicoController::class, 'create'])->middleware(['auth'])->name('servicos.create');
    Route::post('/store', [ServicoController::class, 'store'])->middleware(['auth'])->name('servicos.store');
    Route::get('/show/{id}',[ServicoController::class,'show'])->middleware(['auth'])->name('servicos.show');
    Route::get('/edit/{id}', [ServicoController::class, 'edit'])->middleware(['auth'])->name('servicos.edit');
    Route::post('/update/{id}', [ServicoController::class, 'update'])->middleware(['auth'])->name('servicos.update');
    Route::delete('/delete/{id}', [ServicoController::class, 'destroy'])->middleware(['auth'])->name('servicos.delete');
});
