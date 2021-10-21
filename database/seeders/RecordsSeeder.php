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
        $record->save();
    }
}
