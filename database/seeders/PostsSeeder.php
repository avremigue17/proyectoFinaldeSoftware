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
        $posts->name = "Encargado de carniceria";
        $posts->area_id = "1";
        $posts->save();

        $posts = new Posts();
        $posts->name = "Encargado de alimentos";
        $posts->area_id = "1";
        $posts->save();

        $posts = new Posts();
        $posts->name = "Encargado de refrescos";
        $posts->area_id = "1";
        $posts->save();

        $posts = new Posts();
        $posts->name = "Encargado de panaderia";
        $posts->area_id = "1";
        $posts->save();

        $posts = new Posts();
        $posts->name = "Encargado de farmacia";
        $posts->area_id = "2";
        $posts->save();

        $posts = new Posts();
        $posts->name = "Encargado de electronica";
        $posts->area_id = "2";
        $posts->save();

        $posts = new Posts();
        $posts->name = "Encargado de ropa";
        $posts->area_id = "2";
        $posts->save();
    }
}
