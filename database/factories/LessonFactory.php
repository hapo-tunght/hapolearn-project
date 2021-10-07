<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use phpDocumentor\Reflection\Types\Nullable;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $coursesId = Course::all()->pluck('id')->toArray();

        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(),
            'requirement' => $this->faker->realText(),
            'content' => $this->faker->realText(),
            'learn_time' => rand(1, 4),
            'course_id' => mt_rand(1, count($coursesId)),
        ];
    }
}
