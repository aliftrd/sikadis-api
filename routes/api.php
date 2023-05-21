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
Route::group(['prefix' => 'upload', 'as' => 'upload.'], function () {
    Route::post('/', [App\Http\Controllers\Api\UploadController::class, 'upload'])->name('store');
    Route::delete('/', [App\Http\Controllers\Api\UploadController::class, 'revert'])->name('revert');
});

Route::group(['prefix' => 'v1', 'as' => 'v1.'], function () {
    Route::get('/meta', App\Http\Controllers\Api\FetchMetaController::class);
    Route::get('/religion', App\Http\Controllers\Api\FetchReligionController::class);
    Route::group(['prefix' => 'ppdb'], function () {
        Route::get('/', App\Http\Controllers\Api\StudentCandidate\FetchPpdbController::class);
        Route::post('/', App\Http\Controllers\Api\StudentCandidate\StoreStudentCandidateController::class);
    });

    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
        Route::get('/', App\Http\Controllers\Api\Post\FetchPostsController::class)->name('index');
    });
    Route::group(['prefix' => 'sliders', 'as' => 'sliders.'], function () {
        Route::get('/', App\Http\Controllers\Api\Slider\FetchSlidersController::class)->name('index');
    });
});
