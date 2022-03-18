<?php

use App\Http\Controllers\FeedBackController;
use App\Http\Controllers\GemController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/**
 * @unauthenticated
 */
Route::post('/registration', [UserController::class, 'register']);

/**
 * @unauthenticated
 */
Route::post('/getToken', [UserController::class, 'getToken']);

Route::middleware(['api', 'auth:sanctum'])->group(function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/me', [UserController::class, 'me']);
        Route::delete('/dropToken', [UserController::class, 'dropToken']);
        Route::patch('/update', [UserController::class, 'update']);
        Route::delete('/delete/{id}', [UserController::class, 'delete']);
    });

    Route::group(['prefix' => 'feedback'], function () {
        Route::post('/create', [FeedBackController::class, 'create']);
        Route::get('/showAuth', [FeedBackController::class, 'showAuth']);
        Route::get('/showAll', [FeedBackController::class, 'showAll']);
        Route::patch('/update/{feedback}', [FeedBackController::class, 'update']);
        Route::delete('/delete/{feedback}', [FeedBackController::class, 'delete']);
    });

    Route::group(['prefix' => 'material'], function () {
        Route::post('/create', [MaterialController::class, 'create']);
        Route::get('/show', [MaterialController::class, 'show']);
        Route::patch('/update/{material}', [MaterialController::class, 'update']);
        Route::delete('/delete/{material}', [MaterialController::class, 'delete']);
    });

    Route::group(['prefix' => 'gem'], function () {
        Route::post('/create', [GemController::class, 'create']);
        Route::get('/show', [GemController::class, 'show']);
        Route::patch('/update/{gem}', [GemController::class, 'update']);
        Route::delete('/delete/{gem}', [GemController::class, 'delete']);
    });

    Route::group(['prefix' => 'type'], function () {
        Route::post('/create/{size}', [TypeController::class, 'create']);
        Route::get('/show', [TypeController::class, 'show']);
        Route::get('/take/{size}', [TypeController::class, 'take']);
        Route::patch('/update/{type}', [TypeController::class, 'update']);
        Route::delete('/delete/{type}', [TypeController::class, 'delete']);
    });

    Route::group(['prefix' => 'size'], function () {
        Route::post('/create', [SizeController::class, 'create']);
        Route::get('/show', [SizeController::class, 'show']);
        Route::patch('/update/{size}', [SizeController::class, 'update']);
        Route::delete('/delete/{size}', [SizeController::class, 'delete']);
    });

    Route::group(['prefix' => 'item'], function () {
        Route::post('/create', [ItemController::class, 'create']);
        Route::get('/show', [ItemController::class, 'show']);
        Route::patch('/update/{item}', [ItemController::class, 'update']);
        Route::delete('/delete/{item}', [ItemController::class, 'delete']);
    });
});
