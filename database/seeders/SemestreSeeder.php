<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Semestre')->insert([
            [
                "fechaPlaniInici" => '2024-08-12',
                "fechaPlaniRevis" => '2024-08-30',
                "fechaPlaniFin" => '2024-09-02',
                "fechaDesaInici" => '2024-09-03',
                "fechaDesaFin" => '2024-12-02',
                "fechaEvaluInici" => '2024-12-03',
                "fechaEvaluFin" => '2024-12-28',
            ]
        ]);
    }
}
