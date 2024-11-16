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
                'descripcion' => 'Base de datos estructurada y legible',
                'identificadorEntre' => 1,
            ],
            [
                'descripcion' => 'Input solo debe aceptar caracteres alfabéticos',
                'identificadorEntre' => 1,
            ],
            [
                'descripcion' => 'Sistema accesible desde dispositivos móviles y tabletas',
                'identificadorEntre' => 2,
            ],
            [
                'descripcion' => 'Generación de reportes en menos de 5 segundos',
                'identificadorEntre' => 2,
            ],
            [
                'descripcion' => 'Interfaz amigable y fácil de navegar',
                'identificadorEntre' => 3,
            ],
            [
                'descripcion' => 'Manual de instalación disponible en español',
                'identificadorEntre' => 6,
            ],
            [
                'descripcion' => 'Manual de usuario claro y en español',
                'identificadorEntre' => 6,
            ],
            [
                'descripcion' => 'Manual técnico debe estar completamente en español',
                'identificadorEntre' => 7,
            ],
            [
                'descripcion' => 'Índice completo en el manual de usuario',
                'identificadorEntre' => 7,
            ],
            [
                'descripcion' => 'Índice detallado en el manual técnico',
                'identificadorEntre' => 8,
            ],
            [
                'descripcion' => 'Glosario incluido en el manual de usuario',
                'identificadorEntre' => 11,
            ],
            [
                'descripcion' => 'Sección de preguntas frecuentes en el manual de usuario',
                'identificadorEntre' => 4,
            ],
            [
                'descripcion' => 'Apartado de resolución de problemas en el manual',
                'identificadorEntre' => 4,
            ],
            [
                'descripcion' => 'Ejemplos prácticos en el manual de usuario',
                'identificadorEntre' => 5,
            ],
            [
                'descripcion' => 'Diagramas de arquitectura en el manual técnico',
                'identificadorEntre' => 5,
            ],
            [
                'descripcion' => 'Manual técnico incluye la descripción de arquitectura del sistema',
                'identificadorEntre' => 12,
            ],
            [
                'descripcion' => 'Tecnologías empleadas listadas en el manual de usuario',
                'identificadorEntre' => 13,
            ],
            [
                'descripcion' => 'El sistema debe permitir múltiples usuarios simultáneos',
                'identificadorEntre' => 9,
            ],
            [
                'descripcion' => 'Tiempo de respuesta de la interfaz menor a 3 segundos',
                'identificadorEntre' => 10,
            ],
            [
                'descripcion' => 'Diseño responsivo en todos los navegadores',
                'identificadorEntre' => 11,
            ],
            [
                'descripcion' => 'Instrucciones claras en el apartado de ayuda',
                'identificadorEntre' => 14,
            ],
            [
                'descripcion' => 'Sistema debe ser compatible con navegadores modernos',
                'identificadorEntre' => 15,
            ],
            [
                'descripcion' => 'Procedimientos de seguridad documentados en el manual',
                'identificadorEntre' => 16,
            ],
            [
                'descripcion' => 'Documentación actualizada con las últimas especificaciones',
                'identificadorEntre' => 17,
            ],
            [
                'descripcion' => 'Procedimientos de recuperación en el manual técnico',
                'identificadorEntre' => 18,
            ],
            [
                'descripcion' => 'Manual debe incluir ejemplos de configuración avanzada',
                'identificadorEntre' => 19,
            ],
            [
                'descripcion' => 'Criterios de accesibilidad cumplidos según estándares',
                'identificadorEntre' => 20,
            ],
            [
                'descripcion' => 'Manual de usuario con imágenes descriptivas',
                'identificadorEntre' => 21,
            ],
            [
                'descripcion' => 'Manual de mantenimiento del sistema en formato digital',
                'identificadorEntre' => 22,
            ],
            [
                'descripcion' => 'Pruebas de seguridad incluidas en la documentación técnica',
                'identificadorEntre' => 23,
            ],
            [
                'descripcion' => 'Sistema debe soportar hasta 100 usuarios simultáneos',
                'identificadorEntre' => 24,
            ],
            [
                'descripcion' => 'Documentación disponible en varios formatos (PDF, HTML)',
                'identificadorEntre' => 25,
            ],
            [
                'descripcion' => 'Manual de usuario incluye tutorial paso a paso',
                'identificadorEntre' => 26,
            ],
            [
                'descripcion' => 'El sistema debe garantizar privacidad de los datos',
                'identificadorEntre' => 27,
            ],
            [
                'descripcion' => 'Descripción de la configuración del sistema en el manual técnico',
                'identificadorEntre' => 28,
            ],
            [
                'descripcion' => 'Procedimientos de respaldo en el manual',
                'identificadorEntre' => 29,
            ],
            [
                'descripcion' => 'Manual de usuario incluye un apartado de accesibilidad',
                'identificadorEntre' => 30,
            ],
            [
                'descripcion' => 'Sistema debe enviar notificaciones automáticas de eventos críticos',
                'identificadorEntre' => 31,
            ],
        ]);
    }
}
