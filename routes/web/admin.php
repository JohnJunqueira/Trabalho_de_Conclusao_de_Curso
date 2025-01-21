<?php


use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DivisaoController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\EnderecoController;
use Illuminate\Support\Facades\Route;

//Rota admin
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])
->middleware(['auth', 'admin'])
->name('admin.dashboard');

//Categorias
Route::prefix('categorias')->group(function () {
    Route::get('/index', [CategoriaController::class, 'index'])->middleware(['auth'])->name('categorias.index');
    Route::get('/create', [CategoriaController::class, 'create'])->middleware(['auth'])->name('categorias.create');
    Route::post('/store', [CategoriaController::class, 'store'])->middleware(['auth'])->name('categorias.store');
    Route::get('/show/{id}',[CategoriaController::class,'show'])->middleware(['auth'])->name('categorias.show');
    Route::get('/edit/{id}', [CategoriaController::class, 'edit'])->middleware(['auth'])->name('categorias.edit');
    Route::post('/update/{id}', [CategoriaController::class, 'update'])->middleware(['auth'])->name('categorias.update');
    Route::delete('/delete/{id}', [CategoriaController::class, 'destroy'])->middleware(['auth'])->name('categorias.delete');
});

//Divisoes
Route::prefix('divisoes')->group(function () {
    Route::get('/index', [DivisaoController::class, 'index'])->middleware(['auth'])->name('divisoes.index');
    Route::get('/create', [DivisaoController::class, 'create'])->middleware(['auth'])->name('divisoes.create');
    Route::post('/store', [DivisaoController::class, 'store'])->middleware(['auth'])->name('divisoes.store');
    Route::get('/show/{id}',[DivisaoController::class,'show'])->middleware(['auth'])->name('divisoes.show');
    Route::get('/edit/{id}', [DivisaoController::class, 'edit'])->middleware(['auth'])->name('divisoes.edit');
    Route::post('/update/{id}', [DivisaoController::class, 'update'])->middleware(['auth'])->name('divisoes.update');
    Route::delete('/delete/{id}', [DivisaoController::class, 'destroy'])->middleware(['auth'])->name('divisoes.delete');
});

//Endereços
Route::prefix('enderecos')->group(function () {
    Route::get('/index', [EnderecoController::class, 'index'])->middleware(['auth'])->name('enderecos.index');
    Route::get('/create', [EnderecoController::class, 'create'])->middleware(['auth'])->name('enderecos.create');
    Route::post('/store', [EnderecoController::class, 'store'])->middleware(['auth'])->name('enderecos.store');
    Route::get('/show/{id}',[EnderecoController::class,'show'])->middleware(['auth'])->name('enderecos.show');
    Route::get('/edit/{id}', [EnderecoController::class, 'edit'])->middleware(['auth'])->name('enderecos.edit');
    Route::post('/update/{id}', [EnderecoController::class, 'update'])->middleware(['auth'])->name('enderecos.update');
    Route::delete('/delete/{id}', [EnderecoController::class, 'destroy'])->middleware(['auth'])->name('enderecos.delete');
});

