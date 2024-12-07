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
            ],
            [
                "fechaPlaniInici" => '2024-02-12',
                "fechaPlaniRevis" => '2024-02-28',
                "fechaPlaniFin" => '2024-03-02',
                "fechaDesaInici" => '2024-03-03',
                "fechaDesaFin" => '2024-07-02',
                "fechaEvaluInici" => '2024-07-03',
                "fechaEvaluFin" => '2024-07-28',
            ],
            [
                "fechaPlaniInici" => '2025-02-12',
                "fechaPlaniRevis" => '2025-02-28',
                "fechaPlaniFin" => '2025-03-02',
                "fechaDesaInici" => '2025-03-03',
                "fechaDesaFin" => '2025-07-02',
                "fechaEvaluInici" => '2025-07-03',
                "fechaEvaluFin" => '2025-07-28',
            ]
        ]);
    }
}
