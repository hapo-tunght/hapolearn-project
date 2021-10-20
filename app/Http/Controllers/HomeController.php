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
        $courses = Course::get()->count();
        $lessons = Lesson::get()->count();
        $learners = CourseUser::get()->count();

        foreach ($reviews as $review) {
            $user = User::find($review->user_id);
            $course = Course::find($review->course_id);
            $review->name = $user->name;
            $review->course = $course->title;
            $review->avatar = $user->avatar;
        }
        return view('home', compact('reviews', 'courses', 'lessons', 'learners'));
    }
}
