<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntregableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Entregable')->insert([
            [
                'nombre' => 'Entregable Diseño de Base de Datos',
                'descripcion' => 'Modelo ER',
                'identificadorObjet' => 1, 
            ],
            [
                'nombre' => 'Entregable Manual Técnico',
                'descripcion' => 'Manual',
                'identificadorObjet' => 2, 
            ],
            [
                'nombre' => 'Entregable Manual de Usuario',
                'descripcion' => 'Manual',
                'identificadorObjet' => 3, 
            ],
            [
                'nombre' => 'Entregable Diseño de Base de Datos',
                'descripcion' => 'Modelo ER',
                'identificadorObjet' => 4, 
            ],
            [
                'nombre' => 'Entregable Diseño de Base de Datos',
                'descripcion' => 'Modelo ER',
                'identificadorObjet' => 5, 
            ],
        ]);
    }
}