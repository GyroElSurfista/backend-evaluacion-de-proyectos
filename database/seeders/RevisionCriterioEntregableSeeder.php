<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RevisionCriterioEntregableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('RevisionCriterioEntregable')->insert([
            [
                'cumple' => true,
                'fecha' => '2024-10-01',
                'observacion' => 'Cumple con los requisitos',
                'identificadorCriteAceptEntre' => 1, 
                'identificadorEvaluObjet' => 1, 
            ],
            [
                'cumple' => false,
                'fecha' => '2024-10-01',
                'observacion' => 'No cumple con los requisitos',
                'identificadorCriteAceptEntre' => 2, 
                'identificadorEvaluObjet' => 2, 
            ],
            [
                'cumple' => true,
                'fecha' => '2024-10-01',
                'observacion' => 'Cumple parcialmente',
                'identificadorCriteAceptEntre' => 3, 
                'identificadorEvaluObjet' => 3, 
            ],
            [
                'cumple' => true,
                'fecha' => '2024-10-02',
                'observacion' => 'Cumple con observaciones menores',
                'identificadorCriteAceptEntre' => 4, 
                'identificadorEvaluObjet' => 4, 
            ],
            [
                'cumple' => false,
                'fecha' => '2024-10-02',
                'observacion' => 'No cumple con los estándares',
                'identificadorCriteAceptEntre' => 5, 
                'identificadorEvaluObjet' => 5, 
            ],
        ]);
    }
}