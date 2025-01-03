<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return view('welcome');
});


//Chamando rotas MSFLIX organizadas
foreach(File::allFiles(__DIR__.'/web') as $route_file){
    require $route_file->getPathname();
}



require __DIR__.'/auth.php';



