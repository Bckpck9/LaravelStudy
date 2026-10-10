<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\UpdateController;
use App\Http\Controllers\Post\DeleteController;
use App\Http\Controllers\AuthController;


Route::group(['middleware' => 'api', 'prefix' => 'auth' ], function ($router) {
    Route::post('/login', [AuthController::class,'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);

});


Route::middleware(['auth'])->group(function () {

    Route::get('/posts', IndexController::class);

    Route::post('/posts', StoreController::class);

    Route::get('/posts/{post}', ShowController::class);

    Route::put('/posts/{post}', UpdateController::class);

    Route::delete('/posts/{post}', DeleteController::class);

});