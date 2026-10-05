<?php

use App\Http\Controllers\Post\DeleteController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/posts', IndexController::class)
    ->middleware(['auth', 'admin'])
    ->name('post.index');

Route::post('/posts', StoreController::class)
    ->name('post.store');

Route::get('posts/{post}',ShowController::class)
    ->name('post.show');

Route::put('/posts/{post}',UpdateController::class)
    ->name('post.update');

Route::get('/posts/{post}/edit',EditController::class)
    ->name('post.edit');

Route::delete('posts/{post}',DeleteController::class)
    ->name('post.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
