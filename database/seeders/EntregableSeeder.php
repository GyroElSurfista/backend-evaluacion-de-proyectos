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
                'descripcion' => 'Manual Técnico del Sistema',
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Entregable Manual de Usuario',
                'descripcion' => 'Manual de Usuario del Sistema',
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Entregable Manual de Instalación',
                'descripcion' => 'Manual de Instalación del Sistema',
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Entregable Modelo ER',
                'descripcion' => 'Modelo ER de la Base de Datos',
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Entregable Diseño Arquitectónico',
                'descripcion' => 'Estructura del Sistema',
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Entregable Diseño de interfaces',
                'descripcion' => 'Estructura de la Interfaz de Usuario',
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Entregable Diseño de componentes',
                'descripcion' => 'Componentes del Sistema',
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Entregable Código Fuente',
                'descripcion' => 'Código Fuente del Sistema',
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Entregable Sistema Finalizado',
                'descripcion' => 'Sistema Finalizado',
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Entregable Sistema Probado',
                'descripcion' => 'Sistema Probado',
                'identificadorObjet' => 2,
            ],
        ]);
    }
}
