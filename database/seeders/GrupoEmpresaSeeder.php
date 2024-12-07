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
            // SEMESTRE I-2024
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
            // SEMESTRE II-2024
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
            // SEMESTRE III-2024
            [
                'nombreLargo' => 'Gamma Enterprises SRL',
                'nombreCorto' => 'GammaEnt',
                'identificadorSemes' => 3,
            ],
            [
                'nombreLargo' => 'Delta Dynamics SRL',
                'nombreCorto' => 'DeltaDyn',
                'identificadorSemes' => 3,
            ],
            // SEMESTRE IV-2024
            [
                'nombreLargo' => 'Epsilon Solutions SRL',
                'nombreCorto' => 'EpsilonSol',
                'identificadorSemes' => 4,
            ],
            [
                'nombreLargo' => 'Zeta Systems SRL',
                'nombreCorto' => 'ZetaSys',
                'identificadorSemes' => 4,
            ],
        ]);
    }
}
