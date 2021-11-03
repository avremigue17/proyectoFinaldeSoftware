<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CoursePosts;

class CoursePostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coursePost = new CoursePosts();
        $coursePost->course_id ="1";
        $coursePost->post_id ="1";
        $coursePost->save();
    }
}
