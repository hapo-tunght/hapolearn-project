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

    public function getRatingAttribute()
    {
        return $this->reviews()->where('rate', '!=', 'null')->count();
    }

    public function getFiveStarsAttribute()
    {
        return $this->reviews()->where('rate', config('config.rating.five_stars'))->count();
    }

    public function getFourStarsAttribute()
    {
        return $this->reviews()->where('rate', config('config.rating.four_stars'))->count();
    }

    public function getThreeStarsAttribute()
    {
        return $this->reviews()->where('rate', config('config.rating.three_stars'))->count();
    }

    public function getTwoStarsAttribute()
    {
        return $this->reviews()->where('rate', config('config.rating.two_stars'))->count();
    }

    public function getOneStarAttribute()
    {
        return $this->reviews()->where('rate', config('config.rating.one_star'))->count();
    }

    public function getFiveStarsPercentageAttribute()
    {
        $numberReviews = count($this->reviews);
        if ($numberReviews == 0) {
            return 0;
        } else {
            return round($this->getFiveStarsAttribute() / $numberReviews * 100);
        }
    }

    public function getFourStarsPercentageAttribute()
    {
        $numberReviews = count($this->reviews);
        if ($numberReviews == 0) {
            return 0;
        } else {
            return round($this->getFourStarsAttribute() / $numberReviews * 100);
        }
    }

    public function getThreeStarsPercentageAttribute()
    {
        $numberReviews = count($this->reviews);
        if ($numberReviews == 0) {
            return 0;
        } else {
            return round($this->getThreeStarsAttribute() / $numberReviews * 100);
        }
    }

    public function getTwoStarsPercentageAttribute()
    {
        $numberReviews = count($this->reviews);
        if ($numberReviews == 0) {
            return 0;
        } else {
            return round($this->getTwoStarsAttribute() / $numberReviews * 100);
        }
    }

    public function getOneStarPercentageAttribute()
    {
        $numberReviews = count($this->reviews);
        if ($numberReviews == 0) {
            return 0;
        } else {
            return round($this->getOneStarAttribute() / $numberReviews * 100);
        }
    }

    public function getPercentageRatingAttribute()
    {
        $numberReviews = count($this->reviews);
        $fiveStarReviews = $this->getFiveStarsAttribute();
        $fourStarReviews = $this->getFourStarsAttribute();
        $threeStarReviews = $this->getThreeStarsAttribute();
        $twoStarReviews = $this->getTwoStarsAttribute();
        $oneStarReview = $this->getOneStarAttribute();

        if ($numberReviews == 0) {
            return 0;
        } else {
            $ratingOverview = ($fiveStarReviews * 5 + $fourStarReviews * 4 + $threeStarReviews * 3 + $twoStarReviews * 2 + $oneStarReview) / $numberReviews;
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

    public function scopeFilter($query, $data)
    {
        if (isset($data['keyword'])) {
            $query->where('title', 'LIKE', '%'. $data['keyword'].'%')->orWhere('description', 'LIKE', '%'.$data['keyword'].'%');
        }

        if (isset($data['status'])) {
            if ($data['status'] == config('config.options.newest')) {
                $query->orderBy('id');
            } else {
                $query->orderByDesc('id');
            }
        }

        if (isset($data['number_of_lesson'])) {
            if ($data['number_of_lesson'] == config('config.options.asc')) {
                $query->withCount('lessons')->orderBy('lessons_count');
            } else {
                $query->withCount('lessons')->orderByDesc('lessons_count');
            }
        }

        if (isset($data['teacher'])) {
            $query->whereHas('users', function ($subquery) use ($data) {
                $subquery->where('user_id', $data['teacher']);
            });
        }

        if (isset($data['tag'])) {
            $query->whereHas('tags', function ($subquery) use ($data) {
                $subquery->where('tag_id', $data['tag']);
            });
        }

        if (isset($data['number_of_learner'])) {
            if ($data['number_of_learner'] == config('config.options.asc')) {
                $query->withCount('users')->orderBy('users_count');
            } else {
                $query->withCount('users')->orderByDesc('users_count');
            }
        }

        if (isset($data['total_time'])) {
            if ($data['total_time'] == config('config.options.asc')) {
                $query->withSum('lessons', 'learn_time')->orderBy('lessons_sum_learn_time');
            } else {
                $query->withSum('lessons', 'learn_time')->orderByDesc('lessons_sum_learn_time');
            }
        }
        return $query;
    }
}
