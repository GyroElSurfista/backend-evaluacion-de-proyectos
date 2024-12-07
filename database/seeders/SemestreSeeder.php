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
            // SEMESTRE I-2024 que ya acabó
            [
                "nombre" => 'SEMESTRE I-2024',
                "fechaPlaniInici" => '2024-02-12',
                "fechaPlaniRevis" => '2024-02-28',
                "fechaPlaniFin" => '2024-03-02',
                "fechaDesaInici" => '2024-03-03',
                "fechaDesaFin" => '2024-07-02',
                "fechaEvaluInici" => '2024-07-03',
                "fechaEvaluFin" => '2024-07-28',
            ],
            // SEMESTRE II-2024 que está en planificación (actual)
            [
                "nombre" => 'SEMESTRE II-2024',
                "fechaPlaniInici" => '2024-12-01',
                "fechaPlaniRevis" => '2024-12-28',
                "fechaPlaniFin" => '2024-12-31',
                "fechaDesaInici" => '2025-01-01',
                "fechaDesaFin" => '2025-03-29',
                "fechaEvaluInici" => '2025-03-30',
                "fechaEvaluFin" => '2025-04-26',
            ],
            // SEMESTRE III-2024 que está en desarrollo (actual)
            [
                "nombre" => 'SEMESTRE III-2024',
                "fechaPlaniInici" => '2024-11-12',
                "fechaPlaniRevis" => '2024-11-28',
                "fechaPlaniFin" => '2024-11-30',
                "fechaDesaInici" => '2024-12-01',
                "fechaDesaFin" => '2025-04-01',
                "fechaEvaluInici" => '2025-04-02',
                "fechaEvaluFin" => '2025-05-02',
            ],
            // SEMESTRE IV-2024 que está en evaluación (actual)
            [
                "nombre" => 'SEMESTRE IV-2024',
                "fechaPlaniInici" => '2024-08-12',
                "fechaPlaniRevis" => '2024-08-30',
                "fechaPlaniFin" => '2024-09-02',
                "fechaDesaInici" => '2024-09-03',
                "fechaDesaFin" => '2024-12-02',
                "fechaEvaluInici" => '2024-12-03',
                "fechaEvaluFin" => '2024-12-28',
            ],
            // SEMESTRE I-2025 que recién va a empezar
            [
                "nombre" => 'SEMESTRE I-2025',
                "fechaPlaniInici" => '2025-02-12',
                "fechaPlaniRevis" => '2025-02-28',
                "fechaPlaniFin" => '2025-03-02',
                "fechaDesaInici" => '2025-03-03',
                "fechaDesaFin" => '2025-07-02',
                "fechaEvaluInici" => '2025-07-03',
                "fechaEvaluFin" => '2025-07-28',
            ],
        ]);
    }
}
