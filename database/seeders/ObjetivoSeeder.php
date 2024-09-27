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
                'fechaFin' => '2024-09-22',
                'valorPorce' => 25.00,
                'identificadorPlani' => 1,
            ],
            [
                'nombre' => 'Finalizar UI/UX',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-22',
                'valorPorce' => 30.00,
                'identificadorPlani' => 2,
            ],
            [
                'nombre' => 'Finalizar Modelo ER',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-22',
                'valorPorce' => 20.00,
                'identificadorPlani' => 3,
            ],
            [
                'nombre' => 'Finalizar Funcionalidades de registro',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-22',
                'valorPorce' => 15.00,
                'identificadorPlani' => 4,
            ],
            [
                'nombre' => 'Finalizar Sistema',
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-22',
                'valorPorce' => 10.00,
                'identificadorPlani' => 5,
            ],
        ]);
    }
}
