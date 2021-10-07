<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\User;
use App\Models\Tag;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CourseController extends Controller
{
    public function index()
    {
        $teachers = User::teachers()->get();
        $courses = Course::paginate(config('config.pagination'));
        $tags = Tag::get();
        return view('courses.index', compact('courses', 'teachers', 'tags'));
    }

    public function search(Request $request)
    {
        $data = $request->all();
        $courses = Course::filter($data)->paginate(config('config.pagination'));
        $teachers = User::teachers()->get();
        $tags = Tag::get();
        return view('courses.index', compact('courses', 'teachers', 'tags'));
    }

    public function show(Request $request, Course $course)
    {
        $data = $request->all();
        $join= $course->check_joined_course;
        $check = empty($course->check_joined_course);      
        $lessons = Lesson::search($data, $course)->paginate(config('config.pagination'));
        $otherCourses = Course::inRandomOrder()->limit(config('config.numberOfOtherCourses'))->get();
        return view('courses.detail', compact('course', 'lessons', 'otherCourses'));
    }

    public function join(Course $course)
    {
        $course->users()->attach(Auth::id(), ['created_at' => Carbon::now()]);
        return redirect()->route('course.show', [$course]);
    }

    public function leave(Course $course)
    {
        $course->users()->detach(Auth::id());
        return redirect()->route('course.show', [$course]);
    }
}
