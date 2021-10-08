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
 		$this->call(UserTableSeeder::class); 
        $this->call(PermissionsTableSeeder::class);
        $this->call(PostsSeeder::class); 
        $this->call(CommentsSeeder::class);
        $this->call(PostlikesSeeder::class);
        //php artisan db:seed
        //php artisan migrate:fresh --seed
    }
}
