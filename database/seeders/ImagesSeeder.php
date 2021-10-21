<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\images;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = new images();
        $image->img ="default.png";
        $image->save();
    }
}
