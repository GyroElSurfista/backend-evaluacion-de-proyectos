<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        DB::table('GrupoEmpresa')->insert([
            [
                'nombreLargo' => 'DigitalCochab SRL',
                'nombreCorto' => 'DigitalCocha',
            ],
            [
                'nombreLargo' => 'DigitalLaPaz SRL',
                'nombreCorto' => 'DigitalLaPaz',
            ],
            [
                'nombreLargo' => 'DigitalSantaCruz SRL',
                'nombreCorto' => 'DigitalSantaCruz',
            ],
            [
                'nombreLargo' => 'TechSolutions Ltd',
                'nombreCorto' => 'TechSol',
            ],
            [
                'nombreLargo' => 'Innovative Minds Inc',
                'nombreCorto' => 'InnoMinds',
            ],

        ]);
    }
}
