<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\answers;

class AnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answer = new answers();
        $answer->answer = "Pablito";
        $answer->status = 1;
        $answer->save();

        $answer = new answers();
        $answer->answer = "Pedro";
        $answer->save();

        $answer = new answers();
        $answer->answer = "Jonhy";
        $answer->save();
    }
}
