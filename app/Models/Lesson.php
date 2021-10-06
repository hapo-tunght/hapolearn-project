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

    public function scopeSearch($query, $data, $courseId)
    {
        $query->where([
            ['course_id', '=', $courseId],
            ['title', 'LIKE', '%' . $data['keyword'] . '%']
        ]);
        return $query;
    }
}
