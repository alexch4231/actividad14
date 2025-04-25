<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperheroeController;
use App\Http\Controllers\UniverseController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Mostrar formulario + archivos disponibles
Route::get('/form', [FileController::class, 'list'])->name('form');

// Subida y descarga
Route::post('/upload', [FileController::class, 'upload'])->name('upload');
Route::get('/download', [FileController::class, 'download'])->name('download');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resources([
        'superheroes' => SuperheroeController::class,
        'universes' => UniverseController::class,
        'genders' => GenderController::class,
    ]);
});

require __DIR__.'/auth.php';
