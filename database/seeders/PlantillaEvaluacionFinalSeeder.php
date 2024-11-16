<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantillaEvaluacionFinalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('PlantillaEvaluacionFinal')->insert([
            [
                "nombre" => 'Plantilla de ejemplo',
                "descripcion" => null,
                "puntaje" => 100,
                "identificadorUsuar" => 2,
                "fechaCreac" => '11-11-2024'
            ],
            [
                "nombre" => 'Plantilla de ejemplo 2',
                "descripcion" => null,
                "puntaje" => 100,
                "identificadorUsuar" => 2,
                "fechaCreac" => '11-11-2024'
            ],
        ]);
    }
}
