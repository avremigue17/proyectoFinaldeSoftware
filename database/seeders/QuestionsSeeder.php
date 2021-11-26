<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\questions;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i <= 10; $i++) {
            $question = new questions();
            $question->question = $i."- ¿Quien clavo un clavito en la calva de un calvito?";
            $question->save();
        }
        
    }
}
