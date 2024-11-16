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
                'fecha' => '2024-09-02',
                'identificadorActivSegui' => 1,
            ],
            [
                'descripcion' => 'La funcionalidad de mostrar actividades tiene errores inconsistentes',
                'fecha' => '2024-09-02',
                'identificadorActivSegui' => 1,
            ],
            [
                'descripcion' => 'El manual de usuario necesita corregirse',
                'fecha' => '2024-09-02',
                'identificadorActivSegui' => 2,
            ],
            [
                'descripcion' => 'El sistema no responde adecuadamente bajo carga',
                'fecha' => '2024-09-02',
                'identificadorActivSegui' => 2,
            ],
            [
                'descripcion' => 'El diseño de la interfaz de usuario requiere mejoras',
                'fecha' => '2024-09-02',
                'identificadorActivSegui' => 3,
            ],
            [
                'descripcion' => 'El manual de usuario necesita corregirse',
                'fecha' => '2024-09-02',
                'identificadorActivSegui' => 4,
            ],
            [
                'descripcion' => 'El sistema no responde adecuadamente bajo carga',
                'fecha' => '2024-09-02',
                'identificadorActivSegui' => 5,
            ],
            [
                'descripcion' => 'El diseño de la interfaz de usuario requiere mejoras',
                'fecha' => '2024-09-09',
                'identificadorActivSegui' => 6,
            ],
            [
                'descripcion' => 'El manual de usuario necesita corregirse',
                'fecha' => '2024-09-09',
                'identificadorActivSegui' => 7,
            ],
            [
                'descripcion' => 'El sistema no responde adecuadamente bajo carga',
                'fecha' => '2024-09-09',
                'identificadorActivSegui' => 8,
            ],
            [
                'descripcion' => 'El diseño de la interfaz de usuario requiere mejoras',
                'fecha' => '2024-09-09',
                'identificadorActivSegui' => 9,
            ],
            [
                'descripcion' => 'El manual de usuario necesita corregirse',
                'fecha' => '2024-09-09',
                'identificadorActivSegui' => 10,
            ],
        ]);
    }
}
