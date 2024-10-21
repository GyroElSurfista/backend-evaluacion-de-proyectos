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
                'identificadorEntre' => 1, 
            ],
            [
                'descripcion' => 'El sistema debe ser accesible desde dispositivos móviles',
                'identificadorEntre' => 1, 
            ],
            [
                'descripcion' => 'El reporte debe generarse en menos de 5 segundos',
                'identificadorEntre' => 1, 
            ],
            [
                'descripcion' => 'La interfaz debe ser intuitiva y fácil de usar',
                'identificadorEntre' => 1, 
            ],
            [
                'descripcion' => 'El manual de instalacion debe estar en español',
                'identificadorEntre' => 2,
            ],
            [
                'descripcion' => 'El manual de usuario debe estar en español',
                'identificadorEntre' => 2,
            ],
            [
                'descripcion' => 'El manual técnico debe estar en español',
                'identificadorEntre' => 2,
            ],
            [
                'descripcion' => 'El manual de usuario debe tener un índice',
                'identificadorEntre' => 2,
            ],
            [
                'descripcion' => 'El manual técnico debe tener un índice',
                'identificadorEntre' => 2,
            ]
        ]);
    }
}