<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PostLikes;

class PostLikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$posts = new PostLikes();
        $posts->user_id = 1;
        $posts->post_id = 1;
        $posts->save();

        $posts = new PostLikes();
        $posts->user_id = 1;
        $posts->post_id = 2;
        $posts->save();

        $posts = new PostLikes();
        $posts->user_id = 2;
        $posts->post_id = 1;
        $posts->save();

        $posts = new PostLikes();
        $posts->user_id = 3;
        $posts->post_id = 1;
        $posts->save();
    }
}
