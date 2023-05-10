<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'upload', 'as' => 'upload.'], function () {
    Route::post('/', [\App\Http\Controllers\Api\UploadController::class, 'upload'])->name('store');
    Route::delete('/', [\App\Http\Controllers\Api\UploadController::class, 'revert'])->name('revert');
});

Route::group(['prefix' => 'v1', 'as' => 'v1.'], function () {
    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
        Route::get('/', \App\Http\Controllers\Api\Post\FetchPostsController::class)->name('index');
    });
});
