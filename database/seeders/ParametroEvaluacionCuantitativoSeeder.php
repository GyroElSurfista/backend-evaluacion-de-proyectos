<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParametroEvaluacionCuantitativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ParametroEvaluacionCuantitativo')->insert([
            [
                "identificadorParamEvalu" => 4,
                "valorMinim" => 0,
                "valorMaxim" => 20,
                "cantidadInter" => 20,
            ],
            [
                "identificadorParamEvalu" => 5,
                "valorMinim" => 0,
                "valorMaxim" => 100,
                "cantidadInter" => 100,
            ]
        ]);
    }
}
