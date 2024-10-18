<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BibliotecarioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PrestamoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('bibliotecario', BibliotecarioController::class);
    Route::resource('admin', AdminController::class);
    Route::get('/prestamos', [PrestamoController::class, 'index'])->name('prestamos.index');
    Route::get('/prestamos/solicitar/{libro}', [PrestamoController::class, 'solicitarPrestamo'])->name('prestamos.solicitar');
    Route::get('/mis-prestamos', [PrestamoController::class, 'misPrestamos'])->name('prestamos.misPrestamos');
    Route::get('/bibliotecario-prestamos', [PrestamoController::class, 'listarPrestamos'])->name('bibliotecario-prestamos');
    Route::put('/prestamos/{id}/actualizarEstado', [PrestamoController::class, 'actualizarEstado'])->name('prestamos.actualizarEstado');
});

require __DIR__.'/auth.php';
