<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\User;
use App\Models\Tag;
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

    public function detail($courseId)
    {
        $course = Course::find($courseId);
        $lessons = $course->lessons;
        $teachers = $course->teachers;
        $tags = $course->tags;
        $otherCourses = Course::inRandomOrder()->limit(5)->get();
        $haveNotJoinedCourse = is_null(CourseUser::query()->checkJoinedCourse($courseId)->first());
        return view('courses.detail', compact('course', 'courseId', 'lessons', 'teachers', 'otherCourses', 'tags', 'haveNotJoinedCourse'));
    }

    public function join($courseId)
    {
        $course = Course::find($courseId);
        $course->users()->attach(Auth::id(), ['created_at' => Carbon::now()]);
        return redirect()->route('courses.detail', [$courseId]);
    }

    public function leave($courseId)
    {
        $course = Course::find($courseId);
        $course->users()->detach(Auth::id());
        return redirect()->route('courses.detail', [$courseId]);
    }
}
