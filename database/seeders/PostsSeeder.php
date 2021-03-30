<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Posts;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = new Posts();
        $posts->image = "default.png";
        $posts->user_id = 1;
        $posts->likes = 3;
        $posts->save();

        $posts = new Posts();
        $posts->image = "default.png";
        $posts->user_id = 2;
        $posts->likes = 1;
        $posts->save();
    }
}
