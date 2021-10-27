<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\CourseUser;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reviews = Review::inRandomOrder()->limit(config('config.numberOfOtherCourses'))->get();
        $courses = Course::count();
        $lessons = Lesson::count();
        $learners = User::where('role', config('config.role.student'))->count();
        return view('home', compact('reviews', 'courses', 'lessons', 'learners'));
    }
}
