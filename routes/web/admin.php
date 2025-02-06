<?php


use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DivisaoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Rotas Admin
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])
->middleware(['auth', 'admin'])
->name('admin.dashboard');

//Categorias
Route::prefix('categorias')->group(function () {

    //  Qualquer usuário autenticado pode visualizar categorias
    Route::get('/index', [CategoriaController::class, 'index'])->middleware(['auth'])->name('categorias.index');
    Route::get('/show/{id}',[CategoriaController::class,'show'])->middleware(['auth'])->name('categorias.show');

    // Apenas admin pode criar, editar e excluir categorias
    Route::get('/create', [CategoriaController::class, 'create'])->middleware(['auth','admin'])->name('categorias.create');
    Route::post('/store', [CategoriaController::class, 'store'])->middleware(['auth','admin'])->name('categorias.store');
    Route::get('/edit/{id}', [CategoriaController::class, 'edit'])->middleware(['auth','admin'])->name('categorias.edit');
    Route::post('/update/{id}', [CategoriaController::class, 'update'])->middleware(['auth','admin'])->name('categorias.update');
    Route::delete('/delete/{id}', [CategoriaController::class, 'destroy'])->middleware(['auth','admin'])->name('categorias.delete');
});

//Divisoes
Route::prefix('divisoes')->group(function () {
    Route::get('/index', [DivisaoController::class, 'index'])->middleware(['auth'])->name('divisoes.index');
    Route::get('/show/{id}',[DivisaoController::class,'show'])->middleware(['auth'])->name('divisoes.show');
    Route::get('/create', [DivisaoController::class, 'create'])->middleware(['auth','admin'])->name('divisoes.create');
    Route::post('/store', [DivisaoController::class, 'store'])->middleware(['auth','admin'])->name('divisoes.store');
    Route::get('/edit/{id}', [DivisaoController::class, 'edit'])->middleware(['auth','admin'])->name('divisoes.edit');
    Route::post('/update/{id}', [DivisaoController::class, 'update'])->middleware(['auth','admin'])->name('divisoes.update');
    Route::delete('/delete/{id}', [DivisaoController::class, 'destroy'])->middleware(['auth','admin'])->name('divisoes.delete');
});

//Users
Route::prefix('users')->group(function () {
    Route::get('/prestadores', [UserController::class, 'listarPrestadores'])->name('users.prestadores');
    Route::get('/clientes', [UserController::class, 'listarClientes'])->name('users.clientes');
    // Rota para editar dados de ambos usuários
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    // Rota para atualizar os dados (PATCH ou PUT)
    Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
    // Rota para excluir usuário
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');

});

//Endereços
Route::prefix('enderecos')->group(function () {
    Route::get('/index', [EnderecoController::class, 'index'])->middleware(['auth'])->name('enderecos.index');
    Route::get('/create', [EnderecoController::class, 'create'])->middleware(['auth','prestadorOrAdmin'])->name('enderecos.create');
    Route::post('/store', [EnderecoController::class, 'store'])->middleware(['auth'])->name('enderecos.store');
    Route::get('/show/{id}',[EnderecoController::class,'show'])->middleware(['auth'])->name('enderecos.show');
    Route::get('/edit/{id}', [EnderecoController::class, 'edit'])->middleware(['auth'])->name('enderecos.edit');
    Route::post('/update/{id}', [EnderecoController::class, 'update'])->middleware(['auth'])->name('enderecos.update');
    Route::delete('/delete/{id}', [EnderecoController::class, 'destroy'])->middleware(['auth'])->name('enderecos.delete');
});













