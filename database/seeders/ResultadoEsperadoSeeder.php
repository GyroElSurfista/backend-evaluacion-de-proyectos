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
                'descripcion' => 'Base de datos actualizada',
                'identificadorActiv' => 1,
            ],
            [
                'descripcion' => 'Manuales de usuario revisados',
                'identificadorActiv' => 2,
            ],
            [
                'descripcion' => 'Manual técnico completado',
                'identificadorActiv' => 3,
            ],
            [
                'descripcion' => 'Guía de instalación finalizada',
                'identificadorActiv' => 4,
            ],
            [
                'descripcion' => 'Modelo ER ajustado y aprobado',
                'identificadorActiv' => 5,
            ],
            [
                'descripcion' => 'Interfaces de usuario diseñadas',
                'identificadorActiv' => 6,
            ],
            [
                'descripcion' => 'Esquema de base de datos optimizado',
                'identificadorActiv' => 7,
            ],
            [
                'descripcion' => 'Procedimientos de registro implementados',
                'identificadorActiv' => 8,
            ],
            [
                'descripcion' => 'Pruebas de integración realizadas',
                'identificadorActiv' => 9,
            ],
            [
                'descripcion' => 'Documentación de sistema entregada',
                'identificadorActiv' => 10,
            ],
            [
                'descripcion' => 'Evaluación de soporte y mantenimiento',
                'identificadorActiv' => 11,
            ],
            [
                'descripcion' => 'Módulo de reportes completado',
                'identificadorActiv' => 1,
            ],
            [
                'descripcion' => 'Capacitación para usuarios realizada',
                'identificadorActiv' => 2,
            ],
            [
                'descripcion' => 'Pruebas de rendimiento aprobadas',
                'identificadorActiv' => 3,
            ],
            [
                'descripcion' => 'Sistema desplegado en producción',
                'identificadorActiv' => 4,
            ],
            [
                'descripcion' => 'Pruebas de aceptación del sistema',
                'identificadorActiv' => 5,
            ],
            [
                'descripcion' => 'Componentes de seguridad auditados',
                'identificadorActiv' => 6,
            ],
            [
                'descripcion' => 'Actualización de módulos completada',
                'identificadorActiv' => 7,
            ],
            [
                'descripcion' => 'Funcionalidad de autenticación integrada',
                'identificadorActiv' => 8,
            ],
            [
                'descripcion' => 'Documentación de instalación creada',
                'identificadorActiv' => 9,
            ],
            [
                'descripcion' => 'Sistema probado y listo para producción',
                'identificadorActiv' => 10,
            ],
            [
                'descripcion' => 'Informe de cumplimiento generado',
                'identificadorActiv' => 11,
            ],
        ]);
    }
}
