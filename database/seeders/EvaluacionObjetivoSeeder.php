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
                'fecha' => '2024-10-01',
                'habilitadoPago' => true,
                'sePago' => false,
                'observacion' => 'Pendiente de revisión',
                'identificadorObjet' => 1, 
            ],
            [
                'fecha' => '2024-10-01',
                'habilitadoPago' => true,
                'sePago' => true,
                'observacion' => 'Pago realizado',
                'identificadorObjet' => 2, 
            ],
            [
                'fecha' => '2024-10-01',
                'habilitadoPago' => false,
                'sePago' => false,
                'observacion' => 'No habilitado para pago',
                'identificadorObjet' => 3, 
            ],
            [
                'fecha' => '2024-10-02',
                'habilitadoPago' => true,
                'sePago' => false,
                'observacion' => 'Pago pendiente',
                'identificadorObjet' => 4, 
            ],
            [
                'fecha' => '2024-10-02',
                'habilitadoPago' => true,
                'sePago' => true,
                'observacion' => 'Pago completado',
                'identificadorObjet' => 5, 
            ],
        ]);
    }
}