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
                'nombre' => 'Diseño de Base de Datos',
                'dinamico' => false,
                'fechaCreac' => '2024-08-15',
                'descripcion' => 'Modelo ER',
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Manual de Configuración Técnica',
                'dinamico' => false,
                'fechaCreac' => '2024-08-14',
                'descripcion' => 'Manual Técnico del Sistema',
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Guía de Usuario',
                'dinamico' => false,
                'fechaCreac' => '2024-08-14',
                'descripcion' => 'Manual de Usuario del Sistema',
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Instructivo de Instalación',
                'dinamico' => false,
                'fechaCreac' => '2024-08-14',
                'descripcion' => 'Manual de Instalación del Sistema',
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Esquema Relacional',
                'dinamico' => false,
                'fechaCreac' => '2024-08-14',
                'descripcion' => 'Modelo ER de la Base de Datos',
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Plan de Arquitectura del Sistema',
                'dinamico' => false,
                'fechaCreac' => '2024-08-15',
                'descripcion' => 'Estructura del Sistema',
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Prototipo de Interfaz de Usuario',
                'dinamico' => false,
                'fechaCreac' => '2024-08-15',
                'descripcion' => 'Estructura de la Interfaz de Usuario',
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Esquema de Componentes',
                'dinamico' => false,
                'fechaCreac' => '2024-08-15',
                'descripcion' => 'Componentes del Sistema',
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Código Fuente Inicial',
                'dinamico' => false,
                'fechaCreac' => '2024-08-14',
                'descripcion' => 'Código Fuente del Sistema',
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Entrega Final del Sistema',
                'dinamico' => false,
                'fechaCreac' => '2024-08-14',
                'descripcion' => 'Sistema Finalizado',
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Pruebas de Integración',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'descripcion' => 'Sistema Probado',
                'identificadorObjet' => 3,
            ],
            [
                'nombre' => 'Documentación del Sistema',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'descripcion' => 'Sistema Documentado',
                'identificadorObjet' => 3,
            ],
            [
                'nombre' => 'Implementación del Sistema',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'descripcion' => 'Sistema Instalado',
                'identificadorObjet' => 3,
            ],
            [
                'nombre' => 'Lanzamiento a Producción',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'descripcion' => 'Sistema en Producción',
                'identificadorObjet' => 4,
            ],
            [
                'nombre' => 'Mantenimiento Inicial',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'descripcion' => 'Sistema en Mantenimiento',
                'identificadorObjet' => 4,
            ],
            [
                'nombre' => 'Producción Activa',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'descripcion' => 'Sistema en Producción',
                'identificadorObjet' => 5,
            ],
            [
                'nombre' => 'Soporte Técnico',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'descripcion' => 'Sistema en Mantenimiento',
                'identificadorObjet' => 5,
            ],
            [
                'nombre' => 'Versión de Producción',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'descripcion' => 'Sistema en Producción',
                'identificadorObjet' => 6,
            ],
            [
                'nombre' => 'Actualización de Mantenimiento',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'descripcion' => 'Sistema en Mantenimiento',
                'identificadorObjet' => 6,
            ],
            [
                'nombre' => 'Entrega Operativa',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'descripcion' => 'Sistema en Producción',
                'identificadorObjet' => 7,
            ],
            [
                'nombre' => 'Revisión de Soporte',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'descripcion' => 'Sistema en Mantenimiento',
                'identificadorObjet' => 7,
            ],
            [
                'nombre' => 'Versión Oficial',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'descripcion' => 'Sistema en Producción',
                'identificadorObjet' => 8,
            ],
            [
                'nombre' => 'Control de Mantenimiento',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'descripcion' => 'Sistema en Mantenimiento',
                'identificadorObjet' => 8,
            ],
            [
                'nombre' => 'Operación en Producción',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'descripcion' => 'Sistema en Producción',
                'identificadorObjet' => 9,
            ],
            [
                'nombre' => 'Plan de Mantenimiento',
                'dinamico' => false,
                'fechaCreac' => '2024-07-14',
                'descripcion' => 'Sistema en Mantenimiento',
                'identificadorObjet' => 9,
            ],
            [
                'nombre' => 'Despliegue Final',
                'dinamico' => false,
                'fechaCreac' => '2024-07-12',
                'descripcion' => 'Sistema en Producción',
                'identificadorObjet' => 12,
            ],
            [
                'nombre' => 'Evaluación de Mantenimiento',
                'dinamico' => false,
                'fechaCreac' => '2024-07-11',
                'descripcion' => 'Sistema en Mantenimiento',
                'identificadorObjet' => 12,
            ],
            [
                'nombre' => 'Control de Calidad en Producción',
                'dinamico' => false,
                'fechaCreac' => '2024-07-17',
                'descripcion' => 'Sistema en Producción',
                'identificadorObjet' => 13,
            ],
            [
                'nombre' => 'Monitoreo de Soporte',
                'dinamico' => false,
                'fechaCreac' => '2024-07-10',
                'descripcion' => 'Sistema en Mantenimiento',
                'identificadorObjet' => 14,
            ],
            [
                'nombre' => 'Implementación Completa',
                'dinamico' => false,
                'fechaCreac' => '2024-08-04',
                'descripcion' => 'Sistema en Producción',
                'identificadorObjet' => 15,
            ],
            [
                'nombre' => 'Revisión de Infraestructura',
                'dinamico' => false,
                'fechaCreac' => '2024-08-04',
                'descripcion' => 'Sistema en Mantenimiento',
                'identificadorObjet' => 16,
            ],
        ]);
    }
}
