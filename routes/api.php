<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroeController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\UniverseController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/superheroes', [SuperheroeController::class, 'index']);
Route::get('/superheroes/{id}', [SuperheroeController::class, 'show']);

Route::get('/genders', [GenderController::class, 'index']);
Route::get('/genders/{id}', [GenderController::class, 'show']);

Route::get('/universes', [UniverseController::class, 'index']);
Route::get('/universes/{id}', [UniverseController::class, 'show']);