<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lesson::factory(7000)->create();
    }
}
