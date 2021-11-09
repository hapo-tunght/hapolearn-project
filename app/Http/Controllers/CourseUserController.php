<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CourseUserController extends Controller
{
    public function store(Request $request)
    {
        $course = Course::findOrFail($request['course_id']);
        if (!empty($course->isJoined)) {
            return back()->with('error', 'You have already joined the course, you cannot rejoin again!');
        } else {
            $course->users()->sync([Auth::id() ?? null]);
            return back()->with('success', 'Successfully join this course!');
        }
    }

    public function destroy(Course $courseUser)
    {
        $courseUser->users()->detach(Auth::id());
        return back()->with('success', 'Successfully leave this course!');
    }
}
