<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\GameController::class, 'index'])->name('home');

Route::get('/stat', [\App\Http\Controllers\GameController::class, 'stat'])->name('stat');

Route::get('/gsearch', [\App\Http\Controllers\GameController::class, 'searchGame'])->name('search.game');

Route::get('/games/create', [\App\Http\Controllers\GameController::class, 'create'])->name('games.create');

Route::post('/games', [\App\Http\Controllers\GameController::class, 'store'])->name('games.store');

Route::get('/games/{game}', [\App\Http\Controllers\GameController::class, 'showGame'])->name('games.show');

Route::get('/developer/{developer}', [\App\Http\Controllers\GameController::class, 'showDeveloper'])->name('developer.show');

Route::get('/games/{game}/edit', [\App\Http\Controllers\GameController::class, 'edit'])->name('games.edit');

Route::put('/games/{game}', [\App\Http\Controllers\GameController::class, 'update'])->name('games.update');

Route::delete('/games/{game}', [\App\Http\Controllers\GameController::class, 'destroy'])->name('games.destroy');
