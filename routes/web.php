<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\User\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])
    ->name('login');
Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store')
    ->middleware('throttle:login');
Route::get('/register', [RegisterController::class, 'index'])
    ->name('register');
Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store')
    ->middleware('throttle:register');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    Route::post('/posts', [PostController::class, 'store'])
        ->name('posts.store');
});
