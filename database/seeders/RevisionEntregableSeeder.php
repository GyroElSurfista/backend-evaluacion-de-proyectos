<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RevisionEntregableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('RevisionEntregable')->insert([
            [
                'cumple' => true,
                'fecha' => '2024-09-16',
                'observacion' => 'Cumple con los requisitos',
                'identificadorEntre' => 6,
                'identificadorEvaluObjet' => 1,
            ],
            [
                'cumple' => false,
                'fecha' => '2024-09-16',
                'observacion' => 'No cumple con los requisitos',
                'identificadorEntre' => 7,
                'identificadorEvaluObjet' => 1,
            ],
            [
                'cumple' => true,
                'fecha' => '2024-09-16',
                'observacion' => 'Cumple con los requisitos',
                'identificadorEntre' => 8,
                'identificadorEvaluObjet' => 1,
            ],
            [
                'cumple' => true,
                'fecha' => '2024-09-16',
                'observacion' => 'No cumple con los requisitos',
                'identificadorEntre' => 9,
                'identificadorEvaluObjet' => 1,
            ],
            [
                'cumple' => false,
                'fecha' => '2024-09-16',
                'observacion' => 'Cumple con los requisitos',
                'identificadorEntre' => 10,
                'identificadorEvaluObjet' => 1,
            ]

        ]);
    }
}
