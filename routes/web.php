<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToroController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PeleaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RankingController;

/* 🔸 Redirigir raíz (/) a /login */
Route::redirect('/', '/login');

/* Página pública: Historia */
Route::get('/dashboard', function () {
    return view('historia');
})->name('dashboard');

/* Perfil */
Route::middleware('auth')->group(function () {
    Route::get   ('/profile', [ProfileController::class, 'edit' ])->name('profile.edit');
    Route::patch ('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* CRUD protegidos */
Route::middleware('auth')->group(function () {
    Route::resource('toros',   ToroController::class);
    Route::resource('eventos', EventoController::class);
    Route::resource('peleas',  PeleaController::class);
    Route::get('ranking', [RankingController::class, 'index'])
    ->name('ranking.index')
    ->middleware('auth');
});

/* Crear usuarios (solo admin) */
Route::get ('usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
Route::post('usuarios',        [UserController::class, 'store' ])->name('usuarios.store');



/* Auth scaffolding */
require __DIR__.'/auth.php';
