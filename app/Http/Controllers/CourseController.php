<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\User;
use App\Models\Tag;
use App\Models\Lesson;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        $teachers = User::teachers()->get();
        $courses = Course::filter($data)->paginate(config('config.pagination'));
        $tags = Tag::get();
        
        return view('courses.index', compact('courses', 'teachers', 'tags'));
    }

    public function show(Request $request, Course $course)
    {
        $data = $request->all();
        $lessons = Lesson::search($data, $course)->paginate(config('config.pagination'), ['*'], 'lesson_page');
        $otherCourses = Course::inRandomOrder()->limit(config('config.numberOfOtherCourses'))->get();
        $reviews = $course->reviews()->orderBy('id', 'desc')->paginate(10, ['*'], 'review_page');
        
        return view('courses.show', compact('course', 'lessons', 'otherCourses', 'reviews'));
    }

    public function join(Course $course)
    {
        $course->users()->attach(Auth::id(), ['created_at' => Carbon::now()]);
        return redirect()->route('courses.show', [$course])->with('success', 'Successfully join this course!');
    }

    public function leave(Course $course)
    {
        $course->users()->detach(Auth::id());
        return redirect()->route('courses.show', [$course])->with('success', 'Successfully leave this course!');
    }

    public function review(Request $request, Course $course)
    {
        $data = $request->all();
        Review::create([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
            'content' => $data['review_content'],
            'rate' => $data['rate'],
        ]);
        
        return back()->with('post_review', 'check');
    }
}
