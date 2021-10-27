<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Google Sign In
Route::get('/google', [LoginController::class, 'redirectToGoogle'])->name('google.url');
Route::get('/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('course');
    Route::get('/search', [CourseController::class, 'search'])->name('course.search');
    Route::get('/{course}', [CourseController::class, 'show'])->name('course.show');
    Route::get('/{course}/search', [LessonController::class, 'search'])->name('lessons.search');
});

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('courses')->group(function () {
        Route::get('/{course}/join', [CourseController::class, 'join'])->name('courses.join');
        Route::get('/{course}/leave', [CourseController::class, 'leave'])->name('courses.leave');
        Route::get('/{course}/{lesson}', [LessonController::class, 'show'])->name('lesson.show');
        Route::post('/{course}/review', [CourseController::class, 'review'])->name('courses.review');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [UserController::class, 'show'])->name('user.profile');
        Route::post('/update', [UserController::class, 'update'])->name('user.update');
        Route::post('/avatar', [UserController::class, 'avatar'])->name('user.avatar');
    });
    
    Route::post('/document/learned', [DocumentController::class, 'learn']);
});
