<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index']);

Route::post('/songs/{song}/deactivate', [
    SongController::class,
    'deactivate'
]);

Route::resource('songs', SongController::class);
