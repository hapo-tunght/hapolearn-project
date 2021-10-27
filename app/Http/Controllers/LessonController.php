<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;

class LessonController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Lesson $lesson)
    {
        $otherCourses = Course::inRandomOrder()->limit(config('config.numberOfOtherCourses'))->get();
        return view('lessons.detail', compact('course', 'lesson', 'otherCourses'));
    }
}
