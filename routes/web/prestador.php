<?php

use App\Http\Controllers\Backend\PrestadorController;
use Illuminate\Support\Facades\Route;


//Rota prestador
Route::get('prestador/dashboard', [PrestadorController::class, 'dashboard'])
->middleware(['auth', 'prestador'])
->name('prestador.dashboard');
