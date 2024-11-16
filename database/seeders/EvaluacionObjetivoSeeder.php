<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluacionObjetivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('EvaluacionObjetivo')->insert([
            [
                'fecha' => '2024-09-16',
                'habilitadoPago' => false,
                'sePago' => false,
                'observacion' => 'Pendiente de revisión',
                'identificadorObjet' => 2,
            ],


        ]);
    }
}
