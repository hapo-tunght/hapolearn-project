<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Tag;
use App\Models\Lesson;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $teachers = User::where('role', config('config.role.teacher'))->get();
        $courses = Course::filter($request)->paginate(config('config.pagination'));
        $tags = Tag::get();
        return view('courses.index', compact('courses', 'teachers', 'tags'));
    }

    public function show(Request $request, Course $course)
    {
        $lessons = Lesson::search($request, $course)->paginate(config('config.pagination'), ['*'], 'lesson_page');
        $reviews = $course->reviews()->orderBy('id', 'desc')->paginate(config('config.pagination'), ['*'], 'review_page');
        return view('courses.show', compact('course', 'lessons', 'reviews'));
    }
}
