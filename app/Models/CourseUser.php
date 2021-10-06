<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class CourseUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'course_id', 'user_id'
    ];

    public function scopeCheckJoinedCourse($query, $courseId)
    {
        $query->where([
            ['user_id', '=', Auth::id()],
            ['course_id', '=', $courseId]
        ]);
        return $query;
    }
}
