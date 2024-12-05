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
    public function run(): void
    {
        DB::table('GrupoEmpresa')->insert([
            // [
            //     'nombreLargo' => 'DigitalCochab SRL',
            //     'nombreCorto' => 'DigitalCocha',
            // ],
            // [
            //     'nombreLargo' => 'DigitalLaPaz SRL',
            //     'nombreCorto' => 'DigitalLaPaz',
            // ],
            [
                'nombreLargo' => 'DigitalSantaCruz SRL',
                'nombreCorto' => 'DigitalSantaCruz',
                'identificadorSemes' => 1,
            ],
            [
                'nombreLargo' => 'DigitalCocha SRL',
                'nombreCorto' => 'DigitalCocha',
                'identificadorSemes' => 1,
            ],
            // [
            //     'nombreLargo' => 'Innovative Minds SRL',
            //     'nombreCorto' => 'InnoMinds',
            // ],

            // [
            //     'nombreLargo' => 'Softer Skills SRL',
            //     'nombreCorto' => 'Softer Skills',
            // ],
            //Another seeders
            // [
            //     'nombreLargo' => 'Alpha Technologies SRL',
            //     'nombreCorto' => 'AlphaTech',
            // ],
            // [
            //     'nombreLargo' => 'Beta Innovations SRL',
            //     'nombreCorto' => 'BetaInno',
            // ],
            [
                'nombreLargo' => 'Gamma Enterprises SRL',
                'nombreCorto' => 'GammaEnt',
                'identificadorSemes' => 1,
            ],
            [
                'nombreLargo' => 'Delta Dynamics SRL',
                'nombreCorto' => 'DeltaDyn',
                'identificadorSemes' => 1,
            ],
            // [
            //     'nombreLargo' => 'Epsilon Solutions SRL',
            //     'nombreCorto' => 'EpsilonSol',
            // ],
            // [
            //     'nombreLargo' => 'Zeta Systems SRL',
            //     'nombreCorto' => 'ZetaSys',
            // ],
        ]);
    }
}
