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
                'nombre' => 'Documento de elicitación de requerimientos',
                'dinamico' => false,
                'fechaCreac' => '2024-08-10',
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Product Backlog',
                'dinamico' => false,
                'fechaCreac' => '2024-08-10',
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Producto desarrollado',
                'dinamico' => false,
                'fechaCreac' => '2024-08-10',
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Guia de usuario',
                'dinamico' => false,
                'fechaCreac' => '2024-08-10',
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Documento de requerimientos',
                'dinamico' => false,
                'fechaCreac' => '2024-08-10',
                'identificadorObjet' => 3,
            ],
            [
                'nombre' => 'Product Backlog',
                'dinamico' => false,
                'fechaCreac' => '2024-08-10',
                'identificadorObjet' => 3,
            ],
            [
                'nombre' => 'Software elaborado',
                'dinamico' => false,
                'fechaCreac' => '2024-08-10',
                'identificadorObjet' => 4,
            ],
            [
                'nombre' => 'Manual de instalación',
                'dinamico' => false,
                'fechaCreac' => '2024-08-10',
                'identificadorObjet' => 4,
            ],
            [
                'nombre' => 'Documento de bugs reportados',
                'dinamico' => false,
                'fechaCreac' => '2024-08-10',
                'identificadorObjet' => 5,
            ],
            [
                'nombre' => 'Software funcional',
                'dinamico' => false,
                'fechaCreac' => '2024-08-10',
                'identificadorObjet' => 5,
            ],
            [
                'nombre' => 'Requisitos elicitados',
                'dinamico' => false,
                'fechaCreac' => '2025-02-08',
                'identificadorObjet' => 6,
            ],
            [
                'nombre' => 'Product Backlog',
                'dinamico' => false,
                'fechaCreac' => '2025-02-08',
                'identificadorObjet' => 6,
            ],
            [
                'nombre' => 'Producto desarrollado',
                'dinamico' => false,
                'fechaCreac' => '2025-02-08',
                'identificadorObjet' => 7,
            ],
            [
                'nombre' => 'Código fuente',
                'dinamico' => false,
                'fechaCreac' => '2025-02-08',
                'identificadorObjet' => 7,
            ],
            [
                'nombre' => 'Lista de requerimientos especificados',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'identificadorObjet' => 8,
            ],
            [
                'nombre' => 'Product Backlog',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'identificadorObjet' => 8,
            ],
            [
                'nombre' => 'Software desarrollado',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'identificadorObjet' => 9,
            ],
            [
                'nombre' => 'Manual de usuario',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'identificadorObjet' => 9,
            ]
        ]);
    }
}
