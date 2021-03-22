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
        $posts->likes = 0;
        $posts->user_id = 1;
        $posts->save();

        $posts = new Posts();
        $posts->image = "default.png";
        $posts->likes = 0;
        $posts->user_id = 2;
        $posts->save();
    }
}
