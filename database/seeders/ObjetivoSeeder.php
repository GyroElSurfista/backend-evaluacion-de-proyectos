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
                'fechaInici' => '2024-11-01',
                'fechaFin' => '2024-11-22',
                'valorPorce' => 25.00,
                'identificadorPlani' => 1,
                'planillasGener' => true,
                'planillaEvaluGener' => true,
            ],
            [
                'nombre' => 'Finalizar UI/UX',
                'fechaInici' => '2024-09-24',
                'fechaFin' => '2024-10-14',
                'valorPorce' => 30.00,
                'identificadorPlani' => 1,
                'planillasGener' => true,
                'planillaEvaluGener' => true,
            ],
            [
                'nombre' => 'Finalizar Modelo ER',
                'fechaInici' => '2024-10-15',
                'fechaFin' => '2024-10-28',
                'valorPorce' => 20.00,
                'identificadorPlani' => 1,
                'planillasGener' => false,
                'planillaEvaluGener' => true,
            ],
            [
                'nombre' => 'Finalizar Funcionalidades de registro',
                'fechaInici' => '2024-10-29',
                'fechaFin' => '2024-11-11',
                'valorPorce' => 15.00,
                'identificadorPlani' => 1,
                'planillasGener' => false,
                'planillaEvaluGener' => true,
            ],
            [
                'nombre' => 'Finalizar Sistema',
                'fechaInici' => '2024-11-12',
                'fechaFin' => '2024-11-25',
                'valorPorce' => 10.00,
                'identificadorPlani' => 1,
                'planillasGener' => false,
                'planillaEvaluGener' => true,
            ],
            [
                'nombre' => 'Finalizar PB',
                'fechaInici' => '2024-08-01',
                'fechaFin' => '2024-08-19',
                'valorPorce' => 10.00,
                'identificadorPlani' => 2,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Finalizar Diseño UI',
                'fechaInici' => '2024-08-20',
                'fechaFin' => '2024-08-26',
                'valorPorce' => 10.00,
                'identificadorPlani' => 2,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Finalizar Arquitectura',
                'fechaInici' => '2024-08-27',
                'fechaFin' => '2024-09-02',
                'valorPorce' => 10.00,
                'identificadorPlani' => 2,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Completar desarrollo del proyecto',
                'fechaInici' => '2024-09-03',
                'fechaFin' => '2024-09-16',
                'valorPorce' => 10.00,
                'identificadorPlani' => 2,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
        ]);
    }
}
