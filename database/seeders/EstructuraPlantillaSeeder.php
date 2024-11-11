<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstructuraPlantillaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('EstructuraPlantilla')->insert([
            [
                "identificadorPlantEvaluFinal" => 1,
                "identificadorCriteEvaluFinal" => 1,
                "identificadorParamEvalu" => 1,
                "valorMaxim" => 20,
            ],
            [
                "identificadorPlantEvaluFinal" => 1,
                "identificadorCriteEvaluFinal" => 2,
                "identificadorParamEvalu" => 3,
                "valorMaxim" => 20,
            ],
            [
                "identificadorPlantEvaluFinal" => 1,
                "identificadorCriteEvaluFinal" => 3,
                "identificadorParamEvalu" => 2,
                "valorMaxim" => 20,
            ],
            [
                "identificadorPlantEvaluFinal" => 1,
                "identificadorCriteEvaluFinal" => 4,
                "identificadorParamEvalu" => 3,
                "valorMaxim" => 40,
            ],

            //Plantilla 2
            [
                "identificadorPlantEvaluFinal" => 2,
                "identificadorCriteEvaluFinal" => 1,
                "identificadorParamEvalu" => 1,
                "valorMaxim" => 10,
            ],
            [
                "identificadorPlantEvaluFinal" => 2,
                "identificadorCriteEvaluFinal" => 2,
                "identificadorParamEvalu" => 3,
                "valorMaxim" => 10,
            ],
            [
                "identificadorPlantEvaluFinal" => 2,
                "identificadorCriteEvaluFinal" => 3,
                "identificadorParamEvalu" => 2,
                "valorMaxim" => 40,
            ],
            [
                "identificadorPlantEvaluFinal" => 2,
                "identificadorCriteEvaluFinal" => 4,
                "identificadorParamEvalu" => 3,
                "valorMaxim" => 40,
            ],

        ]);
    }
}
