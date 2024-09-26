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
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-22',
                'valorPorce' => 25.00,
                'identificadorPlani' => 1, 
            ],
            [
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-22',
                'valorPorce' => 30.00,
                'identificadorPlani' => 2, 
            ],
            [
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-22',
                'valorPorce' => 20.00,
                'identificadorPlani' => 3, 
            ],
            [
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-22',
                'valorPorce' => 15.00,
                'identificadorPlani' => 4, 
            ],
            [
                'fechaInici' => '2024-09-01',
                'fechaFin' => '2024-09-22',
                'valorPorce' => 10.00,
                'identificadorPlani' => 5, 
            ],
        ]);
    }
}