<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\GameController::class, 'index'])->name('home');

Route::get('/stat', [\App\Http\Controllers\GameController::class, 'stat'])->name('stat');

Route::get('/gsearch', [\App\Http\Controllers\GameController::class, 'searchGame'])->name('search.game');

// Make sure this show route only matches numeric IDs so `/games/create` isn't captured by it
Route::get('/games/{game}', [\App\Http\Controllers\GameController::class, 'showGame'])->whereNumber('game')->name('games.show');

Route::get('/developer/{developer}', [\App\Http\Controllers\GameController::class, 'showDeveloper'])->name('developer.show');

// Authentication Routes
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard (protected)
Route::get('/dashboard', [\App\Http\Controllers\UserDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('user.dashboard');

// Admin routes: protected by auth + isAdmin
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    // Admin dashboard (user management)
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');

    // User management
    Route::get('/users/{user}/edit', [\App\Http\Controllers\AdminController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [\App\Http\Controllers\AdminController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [\App\Http\Controllers\AdminController::class, 'destroy'])->name('users.destroy');
});

Route::middleware('auth')->group(function () {

    Route::get('/games/create', [\App\Http\Controllers\GameController::class, 'create'])->name('games.create');

    Route::get('/games/{game}/edit', [\App\Http\Controllers\GameController::class, 'edit'])->name('games.edit');

    Route::put('/games/{game}', [\App\Http\Controllers\GameController::class, 'update'])->name('games.update');

    Route::delete('/games/{game}', [\App\Http\Controllers\GameController::class, 'destroy'])->name('games.destroy');

    Route::post('/games', [\App\Http\Controllers\GameController::class, 'store'])->name('games.store');
});
