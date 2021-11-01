<?php

namespace App\Http\Controllers;

use App\Models\DocumentUser;
use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    
    public function learn(Request $request)
    {
        $checkLearned = empty(DocumentUser::query()->checkLearned($request, Auth::id())->first());

        if ($checkLearned) {
            DocumentUser::create([
                'user_id' => Auth::id(),
                'lesson_id' => $request->lessonId,
                'document_id' => $request->documentId
            ]);
        }

        $percentageProgress = Lesson::find($request->lessonId)->progress;

        return response()->json([
            'percentage' => $percentageProgress
        ]);
    }
}
