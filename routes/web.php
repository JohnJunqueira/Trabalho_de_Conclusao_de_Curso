<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


//Chamando rotas MSFLIX organizadas
foreach(File::allFiles(__DIR__.'/web') as $route_file){
    require $route_file->getPathname();
}

//Route::get('/pre-cadastro', [AuthController::class, 'showPreCadastro'])->name('pre-cadastro');
Route::get('/cadastro/{tipo}', [AuthController::class, 'showCadastro'])->name('cadastro');
Route::post('/cadastro/{tipo}',[AuthController::class, 'storeCadastro'])->name('cadastro.store');

Route::get('/pre-cadastro', function () {
    return view('auth.pre-cadastro');
})->name('pre-cadastro');

require __DIR__.'/auth.php';



