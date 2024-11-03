<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParametroEvaluacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ParametroEvaluacion')->insert([
            [
                "nombre" => "Likert 3",
            ],
            [
                "nombre" => "Likert 5",
            ],
            [
                "nombre" => "Sí/NO",
            ],
            [
                "nombre" => "Numérica del 1 al 20",
            ],

            [
                "nombre" => "Numérica del 1 al 100",
            ]
        ]);
    }
}
