<?php

use App\Http\Controllers\TweetController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Auth::routes(['register' => true]); // Habilitar rutas de registro
Auth::routes(); // Esto crea automáticamente la ruta 'logout'

// routes/web.php
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);/* registro */
/* Ruta del kernel para el middleware: vendor/laravel/framework/src/foundation/Http */
// Página de bienvenida (para usuarios NO autenticados)
Route::get('/', function () {
    return view('welcome');
})->name('welcome')->middleware('guest');

// Página principal (solo para usuarios autenticados y no baneados)
Route::get('/home', function () {
    return view('home');
})->name('home')->middleware(['auth', 'baned']); 

// Página de baneo (solo para usuarios autenticados y baneados)
Route::get('/baned', function () {
    if (!Auth::check() || !Auth::user()->is_baned) { // Usuario autenticado pero no baneado
        return redirect()->route('home');
    }
    return view('components.baned-page');
})->name('baned-page')->middleware('auth'); // Middleware 'auth' aplicado

//Rutas de perfil
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
// Rutas de autenticación
Auth::routes();

use App\Http\Controllers\LikeController;

// Likes
Route::post('/tweets/{tweet}/like', [LikeController::class, 'store'])->name('tweets.like');
Route::delete('/tweets/{tweet}/like', [LikeController::class, 'destroy'])->name('tweets.unlike');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


// Ruta para guardar tweets
Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');