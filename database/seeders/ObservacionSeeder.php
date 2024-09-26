<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObservacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Observacion')->insert([
            [
                'descripcion' => 'La base de datos es parcialmente incompleta',
                'fecha' => '2024-09-17',
                'identificadorPlaniSegui' => 1, 
                'identificadorActiv' => 1, 
            ],
            [
                'descripcion' => 'La funcionalidad de mostrar actividades tiene errores inconsistentes',
                'fecha' => '2024-09-17',
                'identificadorPlaniSegui' => 2, 
                'identificadorActiv' => 2, 
            ],
            [
                'descripcion' => 'El manual de usuario necesita corregirse',
                'fecha' => '2024-09-17',
                'identificadorPlaniSegui' => 3, 
                'identificadorActiv' => 3, 
            ],
            [
                'descripcion' => 'El sistema no responde adecuadamente bajo carga',
                'fecha' => '2024-09-25',
                'identificadorPlaniSegui' => 4, 
                'identificadorActiv' => 4, 
            ],
            [
                'descripcion' => 'El diseño de la interfaz de usuario requiere mejoras',
                'fecha' => '2024-09-25',
                'identificadorPlaniSegui' => 5, 
                'identificadorActiv' => 5, 
            ],
        ]);
    }
}