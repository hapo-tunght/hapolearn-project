<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Tag;

class CourseController extends Controller
{
    public function index()
    {
        $teachers = User::teachers()->get();
        $courses = Course::paginate(config('config.pagination'));
        $tags = Tag::get();
        return view('courses.index', compact('courses', 'teachers', 'tags'));
    }

    public function courseSearch(Request $request)
    {
        $data = $request->all();
        $courses = Course::filter($data)->paginate(config('config.pagination'));
        $teachers = User::teachers()->get();
        $tags = Tag::get();
        return view('courses.index', compact('courses', 'teachers', 'tags'));
    }
}
