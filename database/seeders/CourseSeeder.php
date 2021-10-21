<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = new course();
        $course->name = "Como clavar un clavito 2";
        $course->save();
    }
}
