<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserPosts;

class UserPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userPost = new UserPosts();
        $userPost->user_id ="1";
        $userPost->post_id ="1";
        $userPost->save();

        $userPost = new UserPosts();
        $userPost->user_id ="2";
        $userPost->post_id ="1";
        $userPost->save();

        $userPost = new UserPosts();
        $userPost->user_id ="3";
        $userPost->post_id ="1";
        $userPost->save();
    }
}
