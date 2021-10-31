<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
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

    public function getTeachersOfCourseAttribute()
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

    public function getCheckJoinedCourseAttribute()
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

    public function getPercentageRatingAttribute()
    {
        if (count($this->reviews) == 0) {
            return 0;
        } else {
            $ratingOverview = $this->reviews->avg('rate');
            $difference = $ratingOverview - (int) $ratingOverview;

            if ($difference < 0.25) {
                return number_format((int) $ratingOverview, 1);
            } elseif ($difference >= 0.25 && $difference < 0.75) {
                return (int) $ratingOverview + 0.5;
            } elseif ($difference >= 0.75) {
                return number_format((int) $ratingOverview + 1, 1);
            }
        }
    }

    public function getOtherCoursesAttribute()
    {
        return $this->where('id', '!=', $this->id)->inRandomOrder()->limit(config('config.numberOfOtherCourses'))->get();
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

    public function addReview($course, $request)
    {
        Review::create([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
            'content' => $request['review_content'],
            'rate' => $request['rate'],
        ]);
    }
}
