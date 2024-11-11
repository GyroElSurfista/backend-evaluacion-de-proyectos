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
                'nombre' => 'Finalizar PB',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-09',
                'valorPorce' => 25.00,
                'identificadorPlani' => 1,
                'planillasGener' => true,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Finalizar UI/UX',
                'fechaInici' => '2024-09-10',
                'fechaFin' => '2024-09-16',
                'valorPorce' => 30.00,
                'identificadorPlani' => 1,
                'planillasGener' => true,
                'planillaEvaluGener' => true,
            ],
            [
                'nombre' => 'Finalizar Modelo ER',
                'fechaInici' => '2024-09-17',
                'fechaFin' => '2024-09-30',
                'valorPorce' => 20.00,
                'identificadorPlani' => 1,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Finalizar Funcionalidades de registro',
                'fechaInici' => '2024-10-01',
                'fechaFin' => '2024-10-14',
                'valorPorce' => 15.00,
                'identificadorPlani' => 1,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Finalizar Sistema',
                'fechaInici' => '2024-10-15',
                'fechaFin' => '2024-11-25',
                'valorPorce' => 10.00,
                'identificadorPlani' => 1,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Finalizar PB',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-23',
                'valorPorce' => 10.00,
                'identificadorPlani' => 2,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Finalizar Diseño UI',
                'fechaInici' => '2024-09-24',
                'fechaFin' => '2024-09-14',
                'valorPorce' => 10.00,
                'identificadorPlani' => 2,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Finalizar Arquitectura',
                'fechaInici' => '2024-09-15',
                'fechaFin' => '2024-10-04',
                'valorPorce' => 10.00,
                'identificadorPlani' => 2,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Completar desarrollo del proyecto',
                'fechaInici' => '2024-10-05',
                'fechaFin' => '2024-12-02',
                'valorPorce' => 10.00,
                'identificadorPlani' => 2,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Elaborar product backlog',
                'fechaInici' => '2025-09-01',
                'fechaFin' => '2025-09-10',
                'valorPorce' => 10.00,
                'identificadorPlani' => 3,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Completar desarrollo del proyecto',
                'fechaInici' => '2025-09-11',
                'fechaFin' => '2025-09-24',
                'valorPorce' => 10.00,
                'identificadorPlani' => 3,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Finalizar Diseño UI',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-17',
                'valorPorce' => 10.00,
                'identificadorPlani' => 4,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Finalizar Arquitectura',
                'fechaInici' => '2024-09-18',
                'fechaFin' => '2024-10-22',
                'valorPorce' => 10.00,
                'identificadorPlani' => 4,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Finalizar PB',
                'fechaInici' => '2024-10-23',
                'fechaFin' => '2024-12-03',
                'valorPorce' => 10.00,
                'identificadorPlani' => 4,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Finalizar Funcionalidades de registro',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-09',
                'valorPorce' => 10.00,
                'identificadorPlani' => 5,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Finalizar Sistema',
                'fechaInici' => '2024-09-10',
                'fechaFin' => '2024-10-07',
                'valorPorce' => 10.00,
                'identificadorPlani' => 5,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
        ]);
    }
}
