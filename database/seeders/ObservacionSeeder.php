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
                'identificadorActivSegui' => 1, 
            ],
            [
                'descripcion' => 'La funcionalidad de mostrar actividades tiene errores inconsistentes',
                'fecha' => '2024-09-17',
                'identificadorActivSegui' => 2, 
            ],
            [
                'descripcion' => 'El manual de usuario necesita corregirse',
                'fecha' => '2024-09-17',
                'identificadorActivSegui' => 1,
            ],
            [
                'descripcion' => 'El sistema no responde adecuadamente bajo carga',
                'fecha' => '2024-09-25',
                'identificadorActivSegui' => 2,
            ],
            [
                'descripcion' => 'El diseño de la interfaz de usuario requiere mejoras',
                'fecha' => '2024-09-30',
                'identificadorActivSegui' => 2,
            ],
            [
                'descripcion' => 'El manual de usuario necesita corregirse',
                'fecha' => '2024-10-08',
                'identificadorActivSegui' => 2,
            ],
            [
                'descripcion' => 'El sistema no responde adecuadamente bajo carga',
                'fecha' => '2024-09-12',
                'identificadorActivSegui' => 2, 
            ],
            [
                'descripcion' => 'El diseño de la interfaz de usuario requiere mejoras',
                'fecha' => '2024-09-19',
                'identificadorActivSegui' => 2,
            ],
            [
                'descripcion' => 'El manual de usuario necesita corregirse',
                'fecha' => '2024-09-26',
                'identificadorActivSegui' => 2, 
            ],
        ]);
    }
}