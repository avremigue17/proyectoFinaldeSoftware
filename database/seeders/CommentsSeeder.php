<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comments;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = new Comments();
        $comments->text = "hahha que chistoso";
        $comments->likes = 0;
        $comments->user_id = 1;
        $comments->post_id = 2;
        $comments->save();

        $comments = new Comments();
        $comments->text = "hahha que chistoso 2";
        $comments->likes = 0;
        $comments->user_id = 2;
        $comments->post_id = 1;
        $comments->save();
    }
}
