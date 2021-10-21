<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\templates;

class TemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $template = new templates();
        $template->save();
    }
}
