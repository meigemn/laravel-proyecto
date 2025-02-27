<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Página de bienvenida (para usuarios NO autenticados)
Route::get('/', function () {
    return view('welcome');
})->name('welcome')->middleware('guest'); // Middleware 'guest' redirige a autenticados

// Página principal (solo para usuarios autenticados)
Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth'); // Middleware 'auth' protege la ruta

// Rutas de autenticación (login, registro, etc.)
Auth::routes();
