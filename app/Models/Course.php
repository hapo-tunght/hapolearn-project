<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title', 'description', 'logo_path', 'learn_times', 'lesson_learned'
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function reviews() 
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'course_users', 'user_id', 'course_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'course_tags', 'tag_id', 'course_id');
    }
}
