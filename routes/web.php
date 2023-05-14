<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['as' => 'landing.'], function () {
    Route::get('/', [\App\Http\Controllers\LandingController::class, 'welcome'])->name('welcome');
});

Auth::routes([
    'register' => false,
    'reset' => true,
    'verify' => true,
]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified']], function () {
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [App\Http\Controllers\ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [App\Http\Controllers\ProfileController::class, 'update'])->name('update');
        Route::patch('/change-password', [App\Http\Controllers\Auth\PasswordController::class, 'update'])->name('password.update');
    });

    Route::get('/dashboard', App\Http\Controllers\DashboardController::class)->name('dashboard');

    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
        Route::get('', App\Http\Controllers\UserManagement\Role\FetchRolesController::class)->name('index');
        Route::get('/create', [App\Http\Controllers\UserManagement\Role\StoreRoleController::class, 'create'])->name('create');
        Route::post('', [App\Http\Controllers\UserManagement\Role\StoreRoleController::class, 'store'])->name('store');
        Route::get('/{role}/edit', [App\Http\Controllers\UserManagement\Role\UpdateRoleController::class, 'edit'])->name('edit');
        Route::patch('/{role}', [App\Http\Controllers\UserManagement\Role\UpdateRoleController::class, 'update'])->name('update');
        Route::delete('/{role}', \App\Http\Controllers\UserManagement\Role\DestroyRoleController::class)->name('destroy');
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', App\Http\Controllers\UserManagement\User\FetchUsersController::class)->name('index');
        Route::get('/create', [App\Http\Controllers\UserManagement\User\StoreUserController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\UserManagement\User\StoreUserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [App\Http\Controllers\UserManagement\User\UpdateUserController::class, 'edit'])->name('edit');
        Route::patch('/{user}', [App\Http\Controllers\UserManagement\User\UpdateUserController::class, 'update'])->name('update');
        Route::delete('/{user}', \App\Http\Controllers\UserManagement\User\DestroyUserController::class)->name('destroy');
    });

    Route::group(['prefix' => 'sliders', 'as' => 'sliders.'], function () {
        Route::get('/', App\Http\Controllers\Slider\FetchSlidersController::class)->name('index');
        Route::get('/create', [App\Http\Controllers\Slider\StoreSliderController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\Slider\StoreSliderController::class, 'store'])->name('store');
        Route::get('/{slider}/edit', [App\Http\Controllers\Slider\UpdateSliderController::class, 'edit'])->name('edit');
        Route::patch('/{slider}', [App\Http\Controllers\Slider\UpdateSliderController::class, 'update'])->name('update');
        Route::delete('/{slider}', \App\Http\Controllers\Slider\DestroySliderController::class)->name('destroy');
    });

    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
            Route::get('/', App\Http\Controllers\Post\Category\FetchCategoriesController::class)->name('index');
            Route::get('/create', [App\Http\Controllers\Post\Category\StoreCategoryController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Post\Category\StoreCategoryController::class, 'store'])->name('store');
            Route::get('/{category}/edit', [App\Http\Controllers\Post\Category\UpdateCategoryController::class, 'edit'])->name('edit');
            Route::patch('/{category}', [App\Http\Controllers\Post\Category\UpdateCategoryController::class, 'update'])->name('update');
            Route::delete('/{category}', \App\Http\Controllers\Post\Category\DestroyCategoryController::class)->name('destroy');
        });
        Route::get('/', App\Http\Controllers\Post\FetchPostsController::class)->name('index');
        Route::get('/create', [App\Http\Controllers\Post\StorePostController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\Post\StorePostController::class, 'store'])->name('store');
        Route::get('/{post}/edit', [App\Http\Controllers\Post\UpdatePostController::class, 'edit'])->name('edit');
        Route::patch('/{post}', [App\Http\Controllers\Post\UpdatePostController::class, 'update'])->name('update');
        Route::delete('/{post}', \App\Http\Controllers\Post\DestroyPostController::class)->name('destroy');
    });

    Route::group(['prefix' => 'pages', 'as' => 'pages.'], function () {
        Route::get('/', App\Http\Controllers\Page\FetchPagesController::class)->name('index');
        Route::get('/create', [App\Http\Controllers\Page\StorePageController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\Page\StorePageController::class, 'store'])->name('store');
        Route::get('/{page}/edit', [App\Http\Controllers\Page\UpdatePageController::class, 'edit'])->name('edit');
        Route::patch('/{page}', [App\Http\Controllers\Page\UpdatePageController::class, 'update'])->name('update');
        Route::delete('/{page}', \App\Http\Controllers\Page\DestroyPageController::class)->name('destroy');
    });
});
