<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'cliente'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('admin.dashboard');

Route::get('/prestador/dashboard', function () {
    return view('prestador.dashboard');
})->middleware(['auth', 'verified', 'prestador'])->name('prestador.dashboard');

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'edit')->middleware(['auth','cliente'])->name('profile.edit');
    Route::get('/profile/admin', 'edit')->middleware(['auth','admin'])->name('profile.editadmin');
    Route::get('/profile/prestador', 'edit')->middleware(['auth','prestador'])->name('profile.editprestador');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});

