<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Funcion')->insert([
            [
                'nombre' => 'Objetivos',
                'activo' => true,
                'tipo' => 'Registrar y Añadir'
            ],
            [
                'nombre' => 'Entregables',
                'activo' => true,
                'tipo' => 'Registrar y Añadir'
            ],
            [
                'nombre' => 'Actividades',
                'activo' => true,
                'tipo' => 'Registrar y Añadir'
            ],
            [
                'nombre' => 'Planillas de Seguimiento Semanal',
                'activo' => true,
                'tipo' => 'Generar y Crear'
            ],
            [
                'nombre' => 'Planillas de Evaluación de Objetivo',
                'activo' => true,
                'tipo' => 'Generar y Crear'
            ],
            [
                'nombre' => 'Plantillas de Evaluación Final',
                'activo' => true,
                'tipo' => 'Generar y Crear'
            ],
            [
                'nombre' => 'Planillas de Seguimiento Semanal',
                'activo' => true,
                'tipo' => 'Llenar y Completar'
            ],
            [
                'nombre' => 'Planillas de Evaluación de Objetivo',
                'activo' => true,
                'tipo' => 'Llenar y Completar'
            ],
            [
                'nombre' => 'Actividades',
                'activo' => true,
                'tipo' => 'Eliminar'
            ],
            [
                'nombre' => 'Plantillas de Evaluación Final',
                'activo' => true,
                'tipo' => 'Eliminar'
            ],
        ]);
    }
}
