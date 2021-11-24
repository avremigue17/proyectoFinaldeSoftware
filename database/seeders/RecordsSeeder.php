<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\records;

class RecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $record = new records();
        $record->score = 100;
        $record->user_id = 1;
        $record->course_id = 1;
        $record->save();

        $record = new records();
        $record->score = 100;
        $record->user_id = 2;
        $record->course_id = 1;
        $record->save();

        $record = new records();
        $record->score = 100;
        $record->user_id = 3;
        $record->course_id = 1;
        $record->save();
    }
}
