<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Campo')->insert([
            [
                "identificadorParamEvaluCuali" => 1,
                "nombre" => "malo",
                "orden" => 1,
                "valorPorce" => 33,
            ],
            [
                "identificadorParamEvaluCuali" => 1,
                "nombre" => "regular",
                "orden" => 2,
                "valorPorce" => 32,
            ],
            [
                "identificadorParamEvaluCuali" => 1,
                "nombre" => "bueno",
                "orden" => 3,
                "valorPorce" => 35,
            ],
            [
                "identificadorParamEvaluCuali" => 2,
                "nombre" => "muy malo",
                "orden" => 1,
                "valorPorce" => 20,
            ],
            [
                "identificadorParamEvaluCuali" => 2,
                "nombre" => "malo",
                "orden" => 2,
                "valorPorce" => 20,
            ],
            [
                "identificadorParamEvaluCuali" => 2,
                "nombre" => "regular",
                "orden" => 3,
                "valorPorce" => 20,
            ],
            [
                "identificadorParamEvaluCuali" => 2,
                "nombre" => "bueno",
                "orden" => 4,
                "valorPorce" => 20,
            ],
            [
                "identificadorParamEvaluCuali" => 2,
                "nombre" => "muy bueno",
                "orden" => 5,
                "valorPorce" => 20,
            ],
            [
                "identificadorParamEvaluCuali" => 3,
                "nombre" => "Sí",
                "orden" => 1,
                "valorPorce" => 50,
            ],

            [
                "identificadorParamEvaluCuali" => 3,
                "nombre" => "No",
                "orden" => 2,
                "valorPorce" => 50,
            ],
        ]);
    }
}
