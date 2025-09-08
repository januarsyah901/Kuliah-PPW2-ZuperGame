<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/games', [\App\Http\Controllers\GameController::class, 'index'])->name('games.index');

Route::get('/games/{game}', [\App\Http\Controllers\GameController::class, 'show'])->name('games.show');
