<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ChangePasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;

Route::get('/', function () {
    return view('welcome');
});

// Redirigir al usuario a la pantalla de login de Google
Route::get('/auth/google', [SocialController::class, 'redirectToGoogle']);

// Google retorna aqui con los datos del usuario tras autenticarse
Route::get('/auth/google/callback', [SocialController::class, 'handleGoogleCallback']);

// Muestrar el formulario de registro
Route::get('/register', [RegisterController::class, 'show']);

// Procesar y guarda el nuevo usuario
Route::post('/register', [RegisterController::class, 'register']);

// Mostrar el formulario de login
Route::get('/login', [LoginController::class, 'show']);

// Validar las credenciales e inicia sesión
Route::post('/login', [LoginController::class, 'login']);

// Mostrar la pagina principal tras autenticarse
Route::get('/home', [HomeController::class, 'index']);

// Cerrar la sesión y redirigir al login
Route::get('/logout', [LogoutController::class, 'logout']);

// Rutas protegidas: solo accesibles si el usuario esta logueado
Route::middleware('auth')->group(function () {
    // Mostrar el formulario para cambiar contraseña
    Route::get('/change-password', [ChangePasswordController::class, 'show']);
    // Procesar y actualizar la contraseña
    Route::put('/change-password', [ChangePasswordController::class, 'update']);
});