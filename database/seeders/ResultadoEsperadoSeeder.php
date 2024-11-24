<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultadoEsperadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ResultadoEsperado')->insert([
            [
                'descripcion' => 'Cliente entrevistado',
                'identificadorActiv' => 1,
            ],
            [
                'descripcion' => 'Producto desarrollado',
                'identificadorActiv' => 2,
            ],
            [
                'descripcion' => 'Cliente contento',
                'identificadorActiv' => 3,
            ],
            [
                'descripcion' => 'Funcionalidades desarrolladas',
                'identificadorActiv' => 4,
            ],
            [
                'descripcion' => 'Bugs corregidos',
                'identificadorActiv' => 5,
            ],
            [
                'descripcion' => 'Cliente hablado',
                'identificadorActiv' => 6,
            ],
            [
                'descripcion' => 'Proyecto desarrollado',
                'identificadorActiv' => 7,
            ],
            [
                'descripcion' => 'Requisitos capturados',
                'identificadorActiv' => 8,
            ],
            [
                'descripcion' => 'Proyecto finalizado',
                'identificadorActiv' => 9,
            ],
            //Another seeders
            [
                'descripcion' => 'Cliente entrevistado',
                'identificadorActiv' => 10,
            ],
            [
                'descripcion' => 'Producto desarrollado',
                'identificadorActiv' => 11,
            ],
            [
                'descripcion' => 'Cliente contento',
                'identificadorActiv' => 12,
            ],
            [
                'descripcion' => 'Funcionalidades desarrolladas',
                'identificadorActiv' => 13,
            ],
            [
                'descripcion' => 'Bugs corregidos',
                'identificadorActiv' => 14,
            ],
            [
                'descripcion' => 'Cliente hablado',
                'identificadorActiv' => 15,
            ],
            [
                'descripcion' => 'Proyecto desarrollado',
                'identificadorActiv' => 16,
            ],
            [
                'descripcion' => 'Requisitos capturados',
                'identificadorActiv' => 17,
            ],
            [
                'descripcion' => 'Proyecto finalizado',
                'identificadorActiv' => 18,
            ]
        ]);
    }
}
