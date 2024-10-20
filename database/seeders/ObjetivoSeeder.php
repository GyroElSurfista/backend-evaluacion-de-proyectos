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
                'fechaFin' => '2024-09-23',
                'valorPorce' => 25.00,
                'identificadorPlani' => 1,
                'planillasGener' => true,
                'planillaEvaluGener' => true,
            ],
            [
                'nombre' => 'Finalizar UI/UX',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-23',
                'valorPorce' => 30.00,
                'identificadorPlani' => 1,
                'planillasGener' => true,
                'planillaEvaluGener' => true,
            ],
            [
                'nombre' => 'Finalizar Modelo ER',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-24',
                'valorPorce' => 20.00,
                'identificadorPlani' => 1,
                'planillasGener' => true,
                'planillaEvaluGener' => true,
            ],
            [
                'nombre' => 'Finalizar Funcionalidades de registro',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-24',
                'valorPorce' => 15.00,
                'identificadorPlani' => 1,
                'planillasGener' => true,
                'planillaEvaluGener' => true,
            ],
            [
                'nombre' => 'Finalizar Sistema',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-23',
                'valorPorce' => 10.00,
                'identificadorPlani' => 1,
                'planillasGener' => true,
                'planillaEvaluGener' => true,
            ],
            [
                'nombre' => 'Finalizar Diseño UX',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-23',
                'valorPorce' => 10.00,
                'identificadorPlani' => 1,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Finalizar Diseño UI',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-23',
                'valorPorce' => 10.00,
                'identificadorPlani' => 1,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
            [
                'nombre' => 'Finalizar Arquitectura',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-23',
                'valorPorce' => 10.00,
                'identificadorPlani' => 1,
                'planillasGener' => false,
                'planillaEvaluGener' => false,
            ],
        ]);
    }
}
