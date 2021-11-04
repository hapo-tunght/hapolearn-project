<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Course extends Model
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
        return $this->hasMany(Review::class, 'course_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_users', 'course_id', 'user_id')-> withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'course_tags', 'course_id', 'tag_id')->withTimestamps();
    }

    public function getNumberStudentAttribute()
    {
        return $this->users()->where('role', config('config.role.student'))->count();
    }

    public function getTeachersAttribute()
    {
        return $this->users()->where('role', config('config.role.teacher'))->get();
    }

    public function getNumberLessonAttribute()
    {
        return $this->lessons()->count();
    }

    public function getTotalTimeAttribute()
    {
        return $this->lessons()->sum('learn_time');
    }
    public function getLessonsAttribute()
    {
        return $this->lessons()->paginate(config('config.pagination'));
    }

    public function getTagsAttribute()
    {
        return $this->tags()->inRandomOrder()->limit(2)->get();
    }

    public function getIsJoinedAttribute()
    {
        return $this->users()->where('user_id', Auth::id())->first();
    }

    public function getNumberRatingAttribute()
    {
        $numberRating = array(0, 0, 0, 0, 0);
        $numbers = $this->reviews()->selectRaw('rate, count(*) as total')->groupBy('rate')->orderByDesc('rate')->get();
        foreach ($numbers as $number) {
            $numberRating[$number->rate - 1] = $number->total;
        }
        return array_reverse($numberRating);
    }

    public function getRatingOverviewAttribute()
    {
        return $this->reviews->avg('rate');
    }

    public function getDecimalRatingOverviewAttribute()
    {
        $decimal = $this->getRatingOverviewAttribute() - floor($this->getRatingOverviewAttribute());
        return $decimal;
    }

    public function getPercentageRatingAttribute()
    {
        if ($this->getDecimalRatingOverviewAttribute() < 0.25) {
            return number_format(floor($this->getRatingOverviewAttribute()), 1);
        } elseif ($this->getDecimalRatingOverviewAttribute() >= 0.75) {
            return number_format(floor($this->getRatingOverviewAttribute()) + 1, 1);
        } else {
            return floor($this->getRatingOverviewAttribute()) + 0.5;
        }
    }

    public function getOtherCoursesAttribute()
    {
        return $this->where('id', '<>', $this->id)->inRandomOrder()->limit(config('config.numberOfOtherCourses'))->get();
    }

    public function scopeFilter($query, $request)
    {
        if (isset($request['keyword'])) {
            $query->where('title', 'LIKE', '%'. $request['keyword'].'%')->orWhere('description', 'LIKE', '%'.$request['keyword'].'%');
        }

        if (isset($request['status'])) {
            if ($request['status'] == config('config.options.newest')) {
                $query->orderBy('id');
            } else {
                $query->orderByDesc('id');
            }
        }

        if (isset($request['number_of_lesson'])) {
            if ($request['number_of_lesson'] == config('config.options.asc')) {
                $query->withCount('lessons')->orderBy('lessons_count');
            } else {
                $query->withCount('lessons')->orderByDesc('lessons_count');
            }
        }

        if (isset($request['teacher'])) {
            $query->whereHas('users', function ($subquery) use ($request) {
                $subquery->where('user_id', $request['teacher']);
            });
        }

        if (isset($request['tag'])) {
            $query->whereHas('tags', function ($subquery) use ($request) {
                $subquery->where('tag_id', $request['tag']);
            });
        }

        if (isset($request['number_of_learner'])) {
            if ($request['number_of_learner'] == config('config.options.asc')) {
                $query->withCount('users')->orderBy('users_count');
            } else {
                $query->withCount('users')->orderByDesc('users_count');
            }
        }

        if (isset($request['total_time'])) {
            if ($request['total_time'] == config('config.options.asc')) {
                $query->withSum('lessons', 'learn_time')->orderBy('lessons_sum_learn_time');
            } else {
                $query->withSum('lessons', 'learn_time')->orderByDesc('lessons_sum_learn_time');
            }
        }
        return $query;
    }
}
