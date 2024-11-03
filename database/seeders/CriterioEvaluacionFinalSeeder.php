<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriterioEvaluacionFinalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('CriterioEvaluacionFinal')->insert([
            [
                "nombre" => "Aplicación de Ingeniería de Software",
                "descripcion" => "Cuán bien se aplicaron los conceptos de ingeniería de software",
            ],
            [
                "nombre" => "Integridad de la Base de Datos",
                "descripcion" => "La integridad de la base de datos después de efectuar todos los tipos de transacciones",
            ],
            [
                "nombre" => "Calidad del Código",
                "descripcion" => "Mantenimiento, claridad y estructura del código implementado",
            ],
            [
                "nombre" => "Documentación",
                "descripcion" => "La calidad y completitud de la documentación del proyecto",
            ],
            [
                "nombre" => "Pruebas y Validación",
                "descripcion" => "Calidad y cobertura de pruebas aplicadas al sistema",
            ],
            [
                "nombre" => "Usabilidad",
                "descripcion" => "Facilidad de uso e interacción del usuario con la interfaz",
            ],
            [
                "nombre" => "Desempeño y Eficiencia",
                "descripcion" => "Evaluación de la velocidad, eficiencia y rendimiento general del sistema",
            ],
            [
                "nombre" => "Escalabilidad",
                "descripcion" => "Capacidad del sistema para manejar un crecimiento en usuarios o datos",
            ],
            [
                "nombre" => "Seguridad",
                "descripcion" => "Medidas de seguridad implementadas para proteger datos y accesos",
            ],
            [
                "nombre" => "Mantenimiento y Flexibilidad",
                "descripcion" => "Capacidad del sistema para adaptarse y modificarse con facilidad",
            ],
            [
                "nombre" => "Cumplimiento de Requisitos",
                "descripcion" => "Grado de cumplimiento con los requisitos funcionales y no funcionales definidos",
            ],
            [
                "nombre" => "Gestión de Proyecto",
                "descripcion" => "Eficacia en la planificación, gestión de tiempos y organización del equipo",
            ],
            [
                "nombre" => "Accesibilidad",
                "descripcion" => "Adaptación para usuarios con discapacidades y facilidad de acceso",
            ],
            [
                "nombre" => "Interoperabilidad",
                "descripcion" => "Capacidad del sistema para integrarse y funcionar con otros sistemas",
            ],
            [
                "nombre" => "Responsividad",
                "descripcion" => "Adecuación del sistema para adaptarse a diferentes dispositivos y tamaños de pantalla",
            ],
            [
                "nombre" => "Soporte Técnico",
                "descripcion" => "Capacidad para proveer soporte y asistencia técnica al usuario final",
            ]
        ]);
    }
}
