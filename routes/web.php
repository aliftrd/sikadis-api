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
    Route::get('/', [App\Http\Controllers\LandingController::class, 'welcome'])->name('welcome');
    Route::get('/news', [App\Http\Controllers\LandingController::class, 'news'])->name('news');
    Route::get('/news/{post:slug}', [App\Http\Controllers\LandingController::class, 'singleNews'])->name('single-news');
    Route::get('/p/{page:slug}', [App\Http\Controllers\LandingController::class, 'singlePage'])->name('single-page');

    Route::group(['prefix' => 'ppdb', 'as' => 'ppdb.'], function () {
        Route::get('/', [App\Http\Controllers\LandingController::class, 'ppdb'])->name('index');
        Route::post('/', [App\Http\Controllers\LandingController::class, 'ppdbStore'])->name('store');
        Route::group(['prefix' => 'print'], function () {
            Route::get('/', [App\Http\Controllers\LandingController::class, 'ppdbShow'])->name('show');
            Route::post('/', [App\Http\Controllers\LandingController::class, 'ppdbShow'])->name('print');
        });
    });
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
        Route::delete('/{role}', App\Http\Controllers\UserManagement\Role\DestroyRoleController::class)->name('destroy');
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', App\Http\Controllers\UserManagement\User\FetchUsersController::class)->name('index');
        Route::get('/create', [App\Http\Controllers\UserManagement\User\StoreUserController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\UserManagement\User\StoreUserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [App\Http\Controllers\UserManagement\User\UpdateUserController::class, 'edit'])->name('edit');
        Route::patch('/{user}', [App\Http\Controllers\UserManagement\User\UpdateUserController::class, 'update'])->name('update');
        Route::delete('/{user}', App\Http\Controllers\UserManagement\User\DestroyUserController::class)->name('destroy');
    });

    Route::group(['prefix' => 'academic-years', 'as' => 'academic-years.'], function () {
        Route::get('/', App\Http\Controllers\AcademicYear\FetchAcademicYearController::class)->name('index');
        Route::get('/create', [App\Http\Controllers\AcademicYear\StoreAcademicYearController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\AcademicYear\StoreAcademicYearController::class, 'store'])->name('store');
        Route::get('/{academicYear}/edit', [App\Http\Controllers\AcademicYear\UpdateAcademicYearController::class, 'edit'])->name('edit');
        Route::patch('/{academicYear}/status', [App\Http\Controllers\AcademicYear\UpdateAcademicYearController::class, 'updateStatus'])->name('status');
        Route::patch('/{academicYear}/ppdb', [App\Http\Controllers\AcademicYear\UpdateAcademicYearController::class, 'updatePpdb'])->name('ppdb');
        Route::patch('/{academicYear}', [App\Http\Controllers\AcademicYear\UpdateAcademicYearController::class, 'update'])->name('update');
        Route::delete('/{academicYear}', App\Http\Controllers\AcademicYear\DestroyAcademicYearController::class)->name('destroy');
    });

    Route::group(['prefix' => 'student-candidates', 'as' => 'student-candidates.'], function () {
        Route::get('/', App\Http\Controllers\StudentCandidate\FetchStudentCandidateController::class)->name('index');
        Route::get('/{studentCandidate}/edit', [App\Http\Controllers\StudentCandidate\UpdateStudentCandidateController::class, 'edit'])->name('edit');
        Route::patch('/{studentCandidate}', [App\Http\Controllers\StudentCandidate\UpdateStudentCandidateController::class, 'update'])->name('update');
        Route::delete('/{studentCandidate}', App\Http\Controllers\StudentCandidate\DestroyStudentCandidateController::class)->name('destroy');
    });

    Route::group(['prefix' => 'sliders', 'as' => 'sliders.'], function () {
        Route::get('/', App\Http\Controllers\Slider\FetchSlidersController::class)->name('index');
        Route::get('/create', [App\Http\Controllers\Slider\StoreSliderController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\Slider\StoreSliderController::class, 'store'])->name('store');
        Route::get('/{slider}/edit', [App\Http\Controllers\Slider\UpdateSliderController::class, 'edit'])->name('edit');
        Route::patch('/{slider}', [App\Http\Controllers\Slider\UpdateSliderController::class, 'update'])->name('update');
        Route::delete('/{slider}', App\Http\Controllers\Slider\DestroySliderController::class)->name('destroy');
    });

    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
            Route::get('/', App\Http\Controllers\Post\Category\FetchCategoriesController::class)->name('index');
            Route::get('/create', [App\Http\Controllers\Post\Category\StoreCategoryController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Post\Category\StoreCategoryController::class, 'store'])->name('store');
            Route::get('/{category}/edit', [App\Http\Controllers\Post\Category\UpdateCategoryController::class, 'edit'])->name('edit');
            Route::patch('/{category}', [App\Http\Controllers\Post\Category\UpdateCategoryController::class, 'update'])->name('update');
            Route::delete('/{category}', App\Http\Controllers\Post\Category\DestroyCategoryController::class)->name('destroy');
        });
        Route::get('/', App\Http\Controllers\Post\FetchPostsController::class)->name('index');
        Route::get('/create', [App\Http\Controllers\Post\StorePostController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\Post\StorePostController::class, 'store'])->name('store');
        Route::get('/{post}/edit', [App\Http\Controllers\Post\UpdatePostController::class, 'edit'])->name('edit');
        Route::patch('/{post}', [App\Http\Controllers\Post\UpdatePostController::class, 'update'])->name('update');
        Route::delete('/{post}', App\Http\Controllers\Post\DestroyPostController::class)->name('destroy');
    });

    Route::group(['prefix' => 'pages', 'as' => 'pages.'], function () {
        Route::get('/', App\Http\Controllers\Page\FetchPagesController::class)->name('index');
        Route::get('/create', [App\Http\Controllers\Page\StorePageController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\Page\StorePageController::class, 'store'])->name('store');
        Route::get('/{page}/edit', [App\Http\Controllers\Page\UpdatePageController::class, 'edit'])->name('edit');
        Route::patch('/{page}', [App\Http\Controllers\Page\UpdatePageController::class, 'update'])->name('update');
        Route::delete('/{page}', App\Http\Controllers\Page\DestroyPageController::class)->name('destroy');
    });

    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
        Route::group(['prefix' => 'general', 'as' => 'general.'], function () {
            Route::get('/', [App\Http\Controllers\SettingController::class, 'general'])->name('index');
            Route::patch('/', [App\Http\Controllers\SettingController::class, 'general'])->name('update');
        });
        Route::group(['prefix' => 'greeting', 'as' => 'greeting.'], function () {
            Route::get('/', [App\Http\Controllers\SettingController::class, 'greeting'])->name('index');
            Route::patch('/', [App\Http\Controllers\SettingController::class, 'greeting'])->name('update');
        });
        Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
            Route::get('/', [App\Http\Controllers\SettingController::class, 'contact'])->name('index');
            Route::patch('/', [App\Http\Controllers\SettingController::class, 'contact'])->name('update');
        });
    });
});
