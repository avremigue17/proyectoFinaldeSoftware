<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\texts;

class TextsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $text = new texts();
        $text->text = "pablito clavo un clavito en la calva de un calvito";
        $text->save();
    }
}
