<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(); // Esto crea automáticamente la ruta 'logout'

/* Ruta del kernel para el middleware: vendor/laravel/framework/src/foundation/Http */
// Página de bienvenida (para usuarios NO autenticados)
Route::get('/', function () {
    return view('welcome');
})->name('welcome')->middleware('guest');

// Página principal (solo para usuarios autenticados y no baneados)
Route::get('/home', function () {
    return view('home');
})->name('home')->middleware(['auth', 'baned']); // Orden correcto

// Página de baneo (solo para usuarios autenticados y baneados)
Route::get('/baned', function () {
    if (!Auth::check() || !Auth::user()->is_baned) { // Usuario autenticado pero no baneado
        return redirect()->route('home');
    }
    return view('components.baned-page');
})->name('baned-page')->middleware('auth'); // Middleware 'auth' aplicado

// Rutas de autenticación
Auth::routes();