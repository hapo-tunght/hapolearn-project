<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Tag;

class LessonController extends Controller
{
    public function search(Request $request, $courseId)
    {
        $data = $request->all();
        $course = Course::find($courseId);
        $lessons = Lesson::search($data, $courseId)->paginate(config('config.pagination'));
        $otherCourses = Course::inRandomOrder()->limit(5)->get();
        $tags = $course->tags;
        $teachers = $course->teachers;
        $haveNotJoinedCourse = is_null(CourseUser::query()->checkJoinedCourse($courseId)->first());
        return view('courses.detail', compact('course', 'courseId', 'lessons', 'otherCourses', 'teachers', 'tags', 'haveNotJoinedCourse'));
    }
}
