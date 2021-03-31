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
        $posts->image = "post_image1.png";
        $posts->user_id = 1;
        $posts->likes = 2;
        $posts->save();

        $posts = new Posts();
        $posts->image = "post_image2.png";
        $posts->user_id = 2;
        $posts->likes = 2;
        $posts->save();

        $posts = new Posts();
        $posts->image = "post_image3.png";
        $posts->user_id = 3;
        $posts->likes = 0;
        $posts->save();
    }
}
