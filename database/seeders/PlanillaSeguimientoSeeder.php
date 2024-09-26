<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanillaSeguimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('PlanillaSeguimiento')->insert([
            [
                'fecha' => '2024-10-01',
                'observacion' => 'La base de datos es parcialmente incompleta',
                'identificadorObjet' => 1, 
            ],
            [
                'fecha' => '2024-10-01',
                'observacion' => 'La funcionalidad de mostrar actividades tiene errores inconsistentes',
                'identificadorObjet' => 2, 
            ],
            [
                'fecha' => '2024-10-01',
                'observacion' => 'El manual de usuario necesita corregirse',
                'identificadorObjet' => 3, 
            ],
            [
                'fecha' => '2024-10-02',
                'observacion' => 'El sistema no responde adecuadamente bajo carga',
                'identificadorObjet' => 4, 
            ],
            [
                'fecha' => '2024-10-02',
                'observacion' => 'El diseño de la interfaz de usuario requiere mejoras',
                'identificadorObjet' => 5,
            ],
        ]);
    }
}