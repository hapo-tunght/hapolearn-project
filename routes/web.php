<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LessonController;

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

Route::resource('courses', CourseController::class)->only([
    'index', 'show'
]);

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('courses')->group(function () {
        Route::get('/{course}/join', [CourseController::class, 'join'])->name('courses.join');
        Route::get('/{course}/leave', [CourseController::class, 'leave'])->name('courses.leave');
        Route::post('/{course}/review', [CourseController::class, 'review'])->name('courses.review');
    });

    Route::resource('course.lessons', LessonController::class)->only(['show']);
    Route::resource('users', UserController::class)->only([
        'show', 'update'
    ]);
    
    Route::post('/documents/learned', [DocumentController::class, 'learn']);
});
