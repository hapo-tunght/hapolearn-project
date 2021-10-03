<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'logo_path' => $this->faker->imageUrl(),
            'description' => $this->faker->realText(),
            'price' => mt_rand(100, 300),
            'learn_times' => mt_rand(100, 1000),
        ];
    }
}
