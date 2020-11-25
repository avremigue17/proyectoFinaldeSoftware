<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Loan;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loan = new Loan();
        $loan->fecha_de_prestamo="2000";
        $loan->fecha_de_devolucion ="2000";
        $loan->estatus ="secret";
        $loan->user_id =2;
        $loan->movie_id =1;
        $loan->save();
    }
}
