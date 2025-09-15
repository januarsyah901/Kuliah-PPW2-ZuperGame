<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\GameController::class, 'index'])->name('home');

Route::get('/stat', [\App\Http\Controllers\GameController::class, 'stat'])->name('stat');

Route::get('/gsearch', [\App\Http\Controllers\GameController::class, 'searchGame'])->name('search.game');

Route::get('/games/{game}', [\App\Http\Controllers\GameController::class, 'showGame'])->name('games.show');

Route::get('/genre/{genre}', [\App\Http\Controllers\GameController::class, 'showGenre'])->name('genre.show');


