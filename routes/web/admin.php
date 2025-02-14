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
    Route::get('/index', [CategoriaController::class, 'index'])->middleware(['auth'])->name('categorias.index');
    Route::get('/show/{id}',[CategoriaController::class,'show'])->middleware(['auth'])->name('categorias.show');
    Route::get('/create', [CategoriaController::class, 'create'])->middleware(['auth','admin'])->name('categorias.create');
    Route::post('/store', [CategoriaController::class, 'store'])->middleware(['auth','admin'])->name('categorias.store');
    Route::get('/edit/{id}', [CategoriaController::class, 'edit'])->middleware(['auth','admin'])->name('categorias.edit');
    Route::post('/update/{id}', [CategoriaController::class, 'update'])->middleware(['auth','admin'])->name('categorias.update');
    Route::delete('/delete/{id}', [CategoriaController::class, 'destroy'])->middleware(['auth','admin'])->name('categorias.delete');
});

//Divisoes
Route::prefix('divisoes')->group(function () {
    Route::get('/index', [DivisaoController::class, 'index'])->middleware(['auth'])->name('divisoes.index');
    Route::get('/show/{categoria_id}',[DivisaoController::class,'show'])->middleware(['auth'])->name('divisoes.show');
    Route::get('/create', [DivisaoController::class, 'create'])->middleware(['auth','admin'])->name('divisoes.create');
    Route::post('/store', [DivisaoController::class, 'store'])->middleware(['auth','admin'])->name('divisoes.store');
    Route::get('/edit/{id}', [DivisaoController::class, 'edit'])->middleware(['auth','admin'])->name('divisoes.edit');
    Route::post('/update/{id}', [DivisaoController::class, 'update'])->middleware(['auth','admin'])->name('divisoes.update');
    Route::delete('/delete/{id}', [DivisaoController::class, 'destroy'])->middleware(['auth','admin'])->name('divisoes.delete');
});

//Users
Route::prefix('users')->group(function () {
    Route::get('/prestadores', [UserController::class, 'listarPrestadores'])->middleware(['auth', 'admin'])->name('users.prestadores');
    Route::get('/clientes', [UserController::class, 'listarClientes'])->middleware(['auth','admin'])->name('users.clientes');


    Route::get('/prestadores-filtrados/{categoria_id}/{divisao_id}', [UserController::class, 'listarPrestadoresFiltrados'])->middleware(['auth'])->name('users.prestadores.filtrados');

    Route::get('/clientes-filtrados/{categoria_id}/{divisao_id}', [UserController::class, 'listarClientesFiltrados'])->middleware(['auth'])->name('users.clientes.filtrados');



    Route::get('/show/{id}',[UserController::class,'show'])->middleware(['auth'])->name('prestadores.show');
    Route::get('/clientes/show/{id}',[UserController::class,'show'])->middleware(['auth'])->name('clientes.show');
    // Rota para editar dados de ambos usuários
    Route::get('/{id}/edit', [UserController::class, 'edit'])->middleware(['auth','admin'])->name('users.edit');
    // Rota para atualizar os dados (PATCH ou PUT)
    Route::put('/{id}', [UserController::class, 'update'])->middleware(['auth','admin'])->name('users.update');
    // Rota para excluir usuário
    Route::delete('/{id}', [UserController::class, 'destroy'])->middleware(['auth','admin'])->name('users.destroy');

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













