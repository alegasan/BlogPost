<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\MyPostController;
use App\Http\Controllers\User\PostController;
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

    // Posts
    Route::get('/posts', [PostController::class, 'index'])
        ->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])
        ->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])
        ->name('posts.show');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])
        ->name('posts.destroy')
        ->middleware('can:delete,post');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
        ->name('posts.edit')
        ->middleware('can:update,post');
    Route::put('/posts/{post}', [PostController::class, 'update'])
        ->name('posts.update')
        ->middleware('can:update,post');

    // My Posts
    Route::get('/my-posts', [MyPostController::class, 'index'])
        ->name('my-posts.index');
    Route::get('/my-posts/search', [MyPostController::class, 'search'])
        ->name('my-posts.search');

});
