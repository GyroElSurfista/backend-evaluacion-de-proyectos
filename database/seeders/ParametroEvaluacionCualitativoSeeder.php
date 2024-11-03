<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParametroEvaluacionCualitativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ParametroEvaluacionCualitativo')->insert([
            [
                "identificadorParamEvalu" => 1
            ],
            [
                "identificadorParamEvalu" => 2
            ],
            [
                "identificadorParamEvalu" => 3
            ],
        ]);
    }
}
