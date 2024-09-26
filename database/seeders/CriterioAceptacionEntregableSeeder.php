<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriterioAceptacionEntregableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('CriterioAceptacionEntregable')->insert([
            [
                'descripcion' => 'Base de datos legible',
                'identificadorEntre' => 1, 
            ],
            [
                'descripcion' => 'El input solo debe permitir caracteres sin números',
                'identificadorEntre' => 2, 
            ],
            [
                'descripcion' => 'El sistema debe ser accesible desde dispositivos móviles',
                'identificadorEntre' => 3, 
            ],
            [
                'descripcion' => 'El reporte debe generarse en menos de 5 segundos',
                'identificadorEntre' => 4, 
            ],
            [
                'descripcion' => 'La interfaz debe ser intuitiva y fácil de usar',
                'identificadorEntre' => 5, 
            ],
        ]);
    }
}