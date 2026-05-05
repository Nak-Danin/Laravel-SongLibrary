<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\FavoritesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index']);

Route::post('/songs/{song}/deactivate', [
    SongController::class,
    'deactivate'
]);

Route::get('/favorites', [FavoritesController::class, 'index']);

Route::get('/favorites/{genre}', [FavoritesController::class, 'filterGenre']);

Route::resource('songs', SongController::class);

Route::patch('/songs/{song}/addToFavorite', [FavoritesController::class, 'addToFavorite']);

Route::patch('/songs/{song}/removeFromFavorite', [FavoritesController::class, 'removeFromFavorite']);
