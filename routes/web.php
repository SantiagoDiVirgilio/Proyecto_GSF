<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DeporteController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\CanchaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservaController;





Route::view('/', 'home.index')->name('home');
Route::get('contacto', [MensajeController::class, 'create'])->name('mensaje.create');
Route::post('contacto', [MensajeController::class, 'store'])->name('mensaje.store');
Route::get('deportes', [DeporteController::class, 'index'])->name('deportes.index');
Route::get('alquileres', [CanchaController::class, 'index'])->name('canchas.index');
Route::Resource('reservas', ReservaController::class)->names('reservas');
Route::get('alquileres/cancha/{id}', [ReservaController::class, 'show'])->name('reservas.show');
Route::get('alquileres/cancha/{id}/events', [ReservaController::class, 'getEvents'])->name('reservas.events');



//SOLO USUARIOS GUEST
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});

//SOLO USUARIOS LOGUEADOS
Route::middleware('auth')->group(function () {
    Route::view('perfil', 'users.index')->name('perfil');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

//SOLO ADMINISTRADORES -> esto va a ir en un archivo aparte
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    Route::resource('deportes', DeporteController::class)->names('deportes')->except(['index']);
    Route::resource('canchas', CanchaController::class)->names('canchas')->except(['index']);

    Route::get('deportes', [DeporteController::class, 'indexAdmin'])->name('deportes.index');
    Route::get('canchas', [CanchaController::class, 'indexAdmin'])->name('canchas.index');
});


    


