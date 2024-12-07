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
            //Semestre II-2024
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
            //Semestre I-2024
            [
                'nombreLargo' => 'Alpha Technologies SRL',
                'nombreCorto' => 'AlphaTech',
                'identificadorSemes' => 2,
            ],
            [
                'nombreLargo' => 'Beta Innovations SRL',
                'nombreCorto' => 'BetaInno',
                'identificadorSemes' => 2,
            ],
            //Semestre I-2025
            [
                'nombreLargo' => 'Innovative Minds SRL',
                'nombreCorto' => 'InnoMinds',
                'identificadorSemes' => 3,
            ],

            [
                'nombreLargo' => 'Softer Skills SRL',
                'nombreCorto' => 'Softer Skills',
                'identificadorSemes' => 3,
            ],
            //Another seeders
            // [
            //     'nombreLargo' => 'Alpha Technologies SRL',
            //     'nombreCorto' => 'AlphaTech',
            // ],
            // [
            //     'nombreLargo' => 'Beta Innovations SRL',
            //     'nombreCorto' => 'BetaInno',
            // ],
            
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
