<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AreasSeeder::class);
        $this->call(PostsSeeder::class); 
 		$this->call(UserTableSeeder::class); 
        $this->call(PermissionsTableSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(TemplatesSeeder::class);
        $this->call(TextsSeeder::class);
        $this->call(ImagesSeeder::class);
        $this->call(RecordsSeeder::class);
        $this->call(QuestionsSeeder::class);
        $this->call(AnswersSeeder::class);
        //php artisan db:seed
        //php artisan migrate:fresh --seed
    }
}
