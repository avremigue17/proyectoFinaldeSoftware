<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\areas;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area = new areas();
        $area->name = "Perecederos";
        $area->save();

        $area = new areas();
        $area->name = "Variedades";
        $area->save();
    }
}
