<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $course = Course::findOrFail($request['course_id']);
        Review::create([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
            'content' => $request['review_content'],
            'rate' => $request['rate'],
        ]);
        return back()->with('post_review', 'check');
    }
}
