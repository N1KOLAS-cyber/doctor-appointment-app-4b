<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin', 301);
//Route::get('/', function () {
   // return view('welcome');
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Ruta para verificar el idioma actual
Route::get('/check-locale', function () {
    return app()->getLocale(); // debería mostrar "es"
});

// Ruta para verificar traducciones
Route::get('/check-translation', function () {
    return __('auth.failed'); // mostrará el mensaje traducido en español
});
