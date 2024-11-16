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
                'nombre' => 'Finalizar PB (finalizado)',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-09',
                'valorPorce' => 25.00,
                'identificadorPlani' => 1,
                'planillasGener' => true,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Finalizar UI/UX (finalizado)',
                'fechaInici' => '2024-09-10',
                'fechaFin' => '2024-09-16',
                'valorPorce' => 30.00,
                'identificadorPlani' => 1,
                'planillasGener' => true,
                'planillaEvaluGener' => true,
                'fechaEvaluFinalGener' => '2024-09-10'
            ],
            [
                'nombre' => 'Finalizar Modelo ER (finalizado)',
                'fechaInici' => '2024-09-17',
                'fechaFin' => '2024-09-30',
                'valorPorce' => 20.00,
                'identificadorPlani' => 1,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Finalizar Funcionalidades de registro (finalizado)',
                'fechaInici' => '2024-10-01',
                'fechaFin' => '2024-10-14',
                'valorPorce' => 15.00,
                'identificadorPlani' => 1,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Finalizar Sistema (en curso)',
                'fechaInici' => '2024-10-15',
                'fechaFin' => '2024-11-25',
                'valorPorce' => 10.00,
                'identificadorPlani' => 1,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Finalizar PB (finalizado)',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-23',
                'valorPorce' => 10.00,
                'identificadorPlani' => 2,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Finalizar Diseño UI (finalizado)',
                'fechaInici' => '2024-09-24',
                'fechaFin' => '2024-09-14',
                'valorPorce' => 10.00,
                'identificadorPlani' => 2,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Finalizar Arquitectura (finalizado)',
                'fechaInici' => '2024-09-15',
                'fechaFin' => '2024-10-04',
                'valorPorce' => 10.00,
                'identificadorPlani' => 2,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Completar desarrollo del proyecto (en curso)',
                'fechaInici' => '2024-10-05',
                'fechaFin' => '2024-12-02',
                'valorPorce' => 10.00,
                'identificadorPlani' => 2,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Elaborar product backlog (sin iniciar)',
                'fechaInici' => '2025-09-01',
                'fechaFin' => '2025-09-10',
                'valorPorce' => 10.00,
                'identificadorPlani' => 3,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Completar desarrollo del proyecto (sin iniciar)',
                'fechaInici' => '2025-09-11',
                'fechaFin' => '2025-09-24',
                'valorPorce' => 10.00,
                'identificadorPlani' => 3,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Finalizar Diseño UI (finalizado)',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-17',
                'valorPorce' => 10.00,
                'identificadorPlani' => 4,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Finalizar Arquitectura (finalizado)',
                'fechaInici' => '2024-09-18',
                'fechaFin' => '2024-10-22',
                'valorPorce' => 10.00,
                'identificadorPlani' => 4,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Finalizar PB (en curso)',
                'fechaInici' => '2024-10-23',
                'fechaFin' => '2024-11-26',
                'valorPorce' => 10.00,
                'identificadorPlani' => 4,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Finalizar PB (sin iniciar)',
                'fechaInici' => '2024-11-27',
                'fechaFin' => '2024-12-03',
                'valorPorce' => 10.00,
                'identificadorPlani' => 4,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Finalizar Funcionalidades de registro (finalizado)',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-09',
                'valorPorce' => 10.00,
                'identificadorPlani' => 5,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
            [
                'nombre' => 'Finalizar Sistema (finalizado)',
                'fechaInici' => '2024-09-10',
                'fechaFin' => '2024-10-07',
                'valorPorce' => 10.00,
                'identificadorPlani' => 5,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
                'fechaEvaluFinalGener' => null
            ],
        ]);
    }
}
