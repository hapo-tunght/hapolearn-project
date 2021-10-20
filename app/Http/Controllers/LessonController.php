<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Tag;

class LessonController extends Controller
{
    public function show(Course $course, Lesson $lesson)
    {
        $otherCourses = Course::inRandomOrder()->limit(config('config.numberOfOtherCourses'))->get();
        return view('lessons.detail', compact('course', 'lesson', 'otherCourses'));
    }
}
