<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category= new Category();
        $category->name="Terror";
        $category->description = "peliculas que dan miedo";
        $category->save();

        $category= new Category();
        $category->name="Comedia";
        $category->description = "peliculas que dan risa";
        $category->save();

        $category= new Category();
        $category->name="Romance";
        $category->description = "peliculas que dan ";
        $category->save();

        $category= new Category();
        $category->name="Accion";
        $category->description = "peliculas que dan ";
        $category->save();

        $category= new Category();
        $category->name="Drama";
        $category->description = "peliculas que dan ";
        $category->save();

    }
}
