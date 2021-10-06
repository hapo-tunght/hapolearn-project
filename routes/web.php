<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
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

Route::get('/course', [CourseController::class, 'index'])->name('course');
Route::get('/course/search', [CourseController::class, 'courseSearch'])->name('course.search');
Route::get('courses/detail/{courseId}', [CourseController::class, 'courseDetail'])->name('courses.detail');
Route::get('courses/detail/{courseId}/join', [CourseController::class, 'courseJoin'])->name('courses.join')->middleware('auth');
Route::get('courses/detail/{courseId}/leave', [CourseController::class, 'courseLeave'])->name('courses.leave')->middleware('auth');
Route::get('courses/detail/{courseId}/search', [LessonController::class, 'lessonSearch'])->name('lessons.search');
