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

        for ($i = 1; $i <= 10; $i++) {
            $answer = new answers();
            $answer->answer = "Pablito";
            $answer->status = 1;
            $answer->question_id = $i;
            $answer->save();

            $answer = new answers();
            $answer->answer = "Pedro";
            $answer->question_id = $i;
            $answer->save();

            $answer = new answers();
            $answer->answer = "Jonhy";
            $answer->question_id = $i;
            $answer->save();

            $answer = new answers();
            $answer->answer = "Lucas";
            $answer->question_id = $i;
            $answer->save();
        }
    }
}
