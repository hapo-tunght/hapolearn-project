<?php

namespace App\Http\Controllers;

use App\Models\DocumentUser;
use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function index(Course $course, Lesson $lesson)
    {
        $otherCourses = Course::inRandomOrder()->limit(config('config.numberOfOtherCourses'))->get();
        return view('lessons.detail', compact('course', 'lesson', 'otherCourses'));
    }
    public function learn(Request $request)
    {
        $lessonId = $request->lessonId;
        $documentId = $request->documentId;
        $checkLearned = empty(DocumentUser::query()->checkLearned($lessonId, $documentId, Auth::id())->first());

        if ($checkLearned) {
            DocumentUser::create([
                'user_id' => Auth::id(),
                'lesson_id' => $lessonId,
                'document_id' => $documentId
            ]);
        }

        $percentageProgress = Lesson::find($lessonId)->progress;

        return response()->json([
            'percentage' => $percentageProgress
        ]);
    }
}
