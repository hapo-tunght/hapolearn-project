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
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/course', [CourseController::class, 'index'])->name('course');
Route::get('/course/search', [CourseController::class, 'search'])->name('course.search');
Route::get('courses/{course}', [CourseController::class, 'show'])->name('course.show');
Route::get('courses/{course}/search', [LessonController::class, 'search'])->name('lessons.search');

Route::group(['middleware' => 'auth'], function () {
    Route::get('courses/{course}/join', [CourseController::class, 'join'])->name('courses.join');
    Route::get('courses/{course}/leave', [CourseController::class, 'leave'])->name('courses.leave');
    Route::get('courses/{course}/{lesson}', [LessonController::class, 'show'])->name('lesson.show');
    Route::post('courses/{course}/review', [CourseController::class, 'review'])->name('courses.review');
    Route::post('/lesson/document/learned', [DocumentController::class, 'learn']);
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('user/profile/update', [UserController::class, 'update'])->name('user.update');
    Route::post('user/profile/avatar', [UserController::class, 'avatar'])->name('user.avatar');
});
