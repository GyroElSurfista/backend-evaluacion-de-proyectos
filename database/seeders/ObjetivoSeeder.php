<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObjetivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Objetivo')->insert([
            [
                'nombre' => 'Elicitar requerimientos',
                'fechaInici' => '2024-08-12',
                'fechaFin' => '2024-11-20',
                'valorPorce' => 25.00,
                'identificadorPlani' => 1,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Desarrollar producto de software solicitado',
                'fechaInici' => '2024-11-21',
                'fechaFin' => '2024-12-04',
                'valorPorce' => 75.00,
                'identificadorPlani' => 1,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Análisis de requerimientos',
                'fechaInici' => '2024-08-12',
                'fechaFin' => '2024-11-20',
                'valorPorce' => 40.00,
                'identificadorPlani' => 2,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Desarrollo de funcionalidades',
                'fechaInici' => '2024-11-21',
                'fechaFin' => '2024-12-04',
                'valorPorce' => 30.00,
                'identificadorPlani' => 2,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Correcciones de bugs',
                'fechaInici' => '2024-12-05',
                'fechaFin' => '2024-12-11',
                'valorPorce' => 30.00,
                'identificadorPlani' => 2,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            // [
            //     'nombre' => 'Elicitar requisitos',
            //     'fechaInici' => '2025-02-12',
            //     'fechaFin' => '2025-03-05',
            //     'valorPorce' => 10.00,
            //     'identificadorPlani' => 5,
            //     'planillasGener' => false,
            //     'planillaEvaluGener' => false,
            //     'fechaEvaluFinalGener' => null
            // ],
            // [
            //     'nombre' => 'Desarrollar proyecto',
            //     'fechaInici' => '2025-03-06',
            //     'fechaFin' => '2025-04-02',
            //     'valorPorce' => 10.00,
            //     'identificadorPlani' => 5,
            //     'planillasGener' => false,
            //     'planillaEvaluGener' => false,
            //     'fechaEvaluFinalGener' => null
            // ],
            // [
            //     'nombre' => 'Elicitar requisitos',
            //     'fechaInici' => '2025-02-12',
            //     'fechaFin' => '2025-03-05',
            //     'valorPorce' => 10.00,
            //     'identificadorPlani' => 6,
            //     'planillasGener' => false,
            //     'planillaEvaluGener' => false,
            //     'fechaEvaluFinalGener' => null
            // ],
            // [
            //     'nombre' => 'Desarrollar proyecto solicitado',
            //     'fechaInici' => '2025-03-06',
            //     'fechaFin' => '2025-04-02',
            //     'valorPorce' => 10.00,
            //     'identificadorPlani' => 6,
            //     'planillasGener' => false,
            //     'planillaEvaluGener' => false,
            //     'fechaEvaluFinalGener' => null
            // ],
            //Another seeders
            [
                'nombre' => 'Elicitar requerimientos',
                'fechaInici' => '2024-08-14',
                'fechaFin' => '2024-08-27',
                'valorPorce' => 25.00,
                'identificadorPlani' => 3,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Desarrollar producto de software solicitado',
                'fechaInici' => '2024-08-28',
                'fechaFin' => '2024-12-03',
                'valorPorce' => 75.00,
                'identificadorPlani' => 3,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Análisis de requerimientos',
                'fechaInici' => '2024-08-14',
                'fechaFin' => '2024-08-27',
                'valorPorce' => 40.00,
                'identificadorPlani' => 4,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Desarrollo de funcionalidades',
                'fechaInici' => '2024-08-28',
                'fechaFin' => '2024-10-15',
                'valorPorce' => 30.00,
                'identificadorPlani' => 4,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Correcciones de bugs',
                'fechaInici' => '2024-12-04',
                'fechaFin' => '2024-12-10',
                'valorPorce' => 30.00,
                'identificadorPlani' => 4,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            // [
            //     'nombre' => 'Elicitar requisitos',
            //     'fechaInici' => '2025-02-12',
            //     'fechaFin' => '2025-03-04',
            //     'valorPorce' => 10.00,
            //     'identificadorPlani' => 11,
            //     'planillasGener' => false,
            //     'planillaEvaluGener' => false,
            //     'fechaEvaluFinalGener' => null
            // ],
            // [
            //     'nombre' => 'Desarrollar proyecto',
            //     'fechaInici' => '2025-03-05',
            //     'fechaFin' => '2025-06-03',
            //     'valorPorce' => 33.00,
            //     'identificadorPlani' => 11,
            //     'planillasGener' => false,
            //     'planillaEvaluGener' => false,
            //     'fechaEvaluFinalGener' => null
            // ],
            // [
            //     'nombre' => 'Elicitar requisitos',
            //     'fechaInici' => '2025-02-12',
            //     'fechaFin' => '2025-03-04',
            //     'valorPorce' => 20.00,
            //     'identificadorPlani' => 12,
            //     'planillasGener' => false,
            //     'planillaEvaluGener' => false,
            //     'fechaEvaluFinalGener' => null
            // ],
            // [
            //     'nombre' => 'Desarrollar proyecto solicitado',
            //     'fechaInici' => '2025-03-05',
            //     'fechaFin' => '2025-06-03',
            //     'valorPorce' => 35.00,
            //     'identificadorPlani' => 12,
            //     'planillasGener' => false,
            //     'planillaEvaluGener' => false,
            //     'fechaEvaluFinalGener' => null
            // ],

        ]);
    }
}
