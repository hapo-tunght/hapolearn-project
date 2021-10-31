<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\DocumentUser;

class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title', 'course_id', 'description', 'requirement', 'content'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'lesson_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'lesson_users', 'lesson_id', 'user_id')->withTimestamps();
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'lesson_id');
    }

    public function getDocumentsAttribute()
    {
        return $this->documents()->get();
    }

    public function getProgressAttribute()
    {
        $numberOfDocsLearned = DocumentUser::query()->isLearned($this->id, Auth::id())->count();
        $allDocsOfLesson = ($this->documents()->count() == 0) ? 1 : $this->documents()->count();
        $percentageProgress = ($numberOfDocsLearned / $allDocsOfLesson) * 100;
        return ($percentageProgress == 0) ? 0 : round($percentageProgress);
    }

    public function scopeSearch($query, $request, $course)
    {
        if (isset($request['keyword_lesson'])) {
            $query->where('course_id', $course->id)
            ->where('title', 'LIKE', '%' . $request['keyword_lesson'] . '%');
        } else {
            $query->where('course_id', $course->id);
        }
        return $query;
    }
}
