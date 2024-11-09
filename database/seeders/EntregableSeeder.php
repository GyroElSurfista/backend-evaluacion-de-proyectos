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
                'dinamico' => false,
                'fechaCreac' => '2024-10-15',
                'descripcion' => 'Modelo ER',
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Entregable Manual Técnico',
                'dinamico' => false,
                'fechaCreac' => '2024-09-14',
                'descripcion' => 'Manual Técnico del Sistema',
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Entregable Manual de Usuario',
                'dinamico' => false,
                'fechaCreac' => '2024-09-14',
                'descripcion' => 'Manual de Usuario del Sistema',
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Entregable Manual de Instalación',
                'dinamico' => false,
                'fechaCreac' => '2024-09-14',
                'descripcion' => 'Manual de Instalación del Sistema',
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Entregable Modelo ER',
                'dinamico' => false,
                'fechaCreac' => '2024-09-14',
                'descripcion' => 'Modelo ER de la Base de Datos',
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Entregable Diseño Arquitectónico',
                'dinamico' => false,
                'fechaCreac' => '2024-10-15',
                'descripcion' => 'Estructura del Sistema',
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Entregable Diseño de interfaces',
                'dinamico' => false,
                'fechaCreac' => '2024-10-15',
                'descripcion' => 'Estructura de la Interfaz de Usuario',
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Entregable Diseño de componentes',
                'dinamico' => false,
                'fechaCreac' => '2024-10-15',
                'descripcion' => 'Componentes del Sistema',
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Entregable Código Fuente',
                'dinamico' => false,
                'fechaCreac' => '2024-09-14',
                'descripcion' => 'Código Fuente del Sistema',
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Entregable Sistema Finalizado',
                'dinamico' => false,
                'fechaCreac' => '2024-09-14',
                'descripcion' => 'Sistema Finalizado',
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Entregable Sistema Probado',
                'dinamico' => false,
                'fechaCreac' => '2024-09-14',
                'descripcion' => 'Sistema Probado',
                'identificadorObjet' => 3,
            ],
            [
                'nombre' => 'Entregable Sistema Documentado',
                'dinamico' => true,
                'fechaCreac' => '2024-09-14',
                'descripcion' => 'Sistema Documentado',
                'identificadorObjet' => 3,
            ],
            [
                'nombre' => 'Entregable Sistema Instalado',
                'dinamico' => true,
                'fechaCreac' => '2024-09-14',
                'descripcion' => 'Sistema Instalado',
                'identificadorObjet' => 3,
            ],
            [
                'nombre' => 'Entregable Sistema en Producción',
                'dinamico' => true,
                'fechaCreac' => '2024-09-14',
                'descripcion' => 'Sistema en Producción',
                'identificadorObjet' => 3,
            ],
            [
                'nombre' => 'Entregable Sistema en Mantenimiento',
                'dinamico' => true,
                'fechaCreac' => '2024-09-14',
                'descripcion' => 'Sistema en Mantenimiento',
                'identificadorObjet' => 3,
            ],
        ]);
    }
}
