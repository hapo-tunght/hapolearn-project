<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function scopeSearch($query, $data, $course)
    {
        if (isset($data['keyword_lesson'])) {
            $query->where('course_id', $course->id)
            ->andWhere('title', 'LIKE', '%' . $data['keyword_lesson'] . '%');
        }
        else {
            $query->where('course_id', $course->id);
        }
        return $query;
    }
}
