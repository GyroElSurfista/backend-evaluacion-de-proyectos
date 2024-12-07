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
            //Semestre II-2024
            [
                'descripcion' => 'Legibilidad',
                'identificadorEntre' => 1,
            ],
            [
                'descripcion' => 'Correctitud',
                'identificadorEntre' => 1,
            ],
            [
                'descripcion' => 'Product backlog completo',
                'identificadorEntre' => 2,
            ],
            [
                'descripcion' => 'Product backlog priorizado',
                'identificadorEntre' => 2,
            ],
            [
                'descripcion' => 'Funciona correctamente',
                'identificadorEntre' => 3,
            ],
            [
                'descripcion' => 'Es fácil de usar',
                'identificadorEntre' => 3,
            ],
            [
                'descripcion' => 'Legibilidad',
                'identificadorEntre' => 4,
            ],
            [
                'descripcion' => 'Usabilidad',
                'identificadorEntre' => 4,
            ],
            [
                'descripcion' => 'El documento es claro',
                'identificadorEntre' => 5,
            ],
            [
                'descripcion' => 'El documento está bien estructurado',
                'identificadorEntre' => 5,
            ],
            [
                'descripcion' => 'Incluye las necesidades primordiales',
                'identificadorEntre' => 6,
            ],
            [
                'descripcion' => 'Las historias de usuario están bien redactadas',
                'identificadorEntre' => 6,
            ],
            [
                'descripcion' => 'El software hace lo que el usuario quiere',
                'identificadorEntre' => 7,
            ],
            [
                'descripcion' => 'El software es fácil de usar',
                'identificadorEntre' => 7,
            ],
            [
                'descripcion' => 'El manual de instalación es fácil de seguir',
                'identificadorEntre' => 8,
            ],
            [
                'descripcion' => 'El manual de instalación está completo',
                'identificadorEntre' => 8,
            ],
            [
                'descripcion' => 'Los bugs han sido correctamente reportados',
                'identificadorEntre' => 9,
            ],
            [
                'descripcion' => 'El documento es legible',
                'identificadorEntre' => 9,
            ],
            [
                'descripcion' => 'Tiempo de respuesta de la interfaz menor a 3 segundos',
                'identificadorEntre' => 10,
            ],
            [
                'descripcion' => 'Diseño responsivo en todos los navegadores',
                'identificadorEntre' => 10,
            ],
            [
                'descripcion' => 'Legibilidad',
                'identificadorEntre' => 11,
            ],
            [
                'descripcion' => 'Correctitud',
                'identificadorEntre' => 11,
            ],
            [
                'descripcion' => 'Product backlog completo',
                'identificadorEntre' => 12,
            ],
            [
                'descripcion' => 'Product backlog priorizado',
                'identificadorEntre' => 12,
            ],
            [
                'descripcion' => 'Funciona correctamente',
                'identificadorEntre' => 13,
            ],
            [
                'descripcion' => 'Es fácil de usar',
                'identificadorEntre' => 13,
            ],
            [
                'descripcion' => 'Legibilidad',
                'identificadorEntre' => 14,
            ],
            [
                'descripcion' => 'Usabilidad',
                'identificadorEntre' => 14,
            ],
            [
                'descripcion' => 'El documento es claro',
                'identificadorEntre' => 15,
            ],
            [
                'descripcion' => 'El documento está bien estructurado',
                'identificadorEntre' => 15,
            ],
            [
                'descripcion' => 'Incluye las necesidades primordiales',
                'identificadorEntre' => 16,
            ],
            [
                'descripcion' => 'Las historias de usuario están bien redactadas',
                'identificadorEntre' => 16,
            ],
            [
                'descripcion' => 'El software hace lo que el usuario quiere',
                'identificadorEntre' => 17,
            ],
            [
                'descripcion' => 'El software es fácil de usar',
                'identificadorEntre' => 17,
            ],
            [
                'descripcion' => 'El manual de instalación es fácil de seguir',
                'identificadorEntre' => 18,
            ],
            [
                'descripcion' => 'El manual de instalación está completo',
                'identificadorEntre' => 18,
            ],
            [
                'descripcion' => 'Los bugs han sido correctamente reportados',
                'identificadorEntre' => 19,
            ],
            [
                'descripcion' => 'El documento es legible',
                'identificadorEntre' => 19,
            ],
            [
                'descripcion' => 'Tiempo de respuesta de la interfaz menor a 3 segundos',
                'identificadorEntre' => 20,
            ],
            [
                'descripcion' => 'Diseño responsivo en todos los navegadores',
                'identificadorEntre' => 20,
            ],
            //Semestre I-2024
            [
                'descripcion' => 'Los requerimientos expresan las necesidades del cliente',
                'identificadorEntre' => 21,
            ],
            [
                'descripcion' => 'El documento es legible',
                'identificadorEntre' => 21,
            ],
            [
                'descripcion' => 'Product Backlog completo',
                'identificadorEntre' => 22,
            ],
            [
                'descripcion' => 'El Product Backlog se corresponde con los requerimientos',
                'identificadorEntre' => 22,
            ],
            [
                'descripcion' => 'El producto hace lo que el cliente necesita',
                'identificadorEntre' => 23,
            ],
            [
                'descripcion' => 'El producto es robusto',
                'identificadorEntre' => 23,
            ],
            [
                'descripcion' => 'El código fuente sigue estándares',
                'identificadorEntre' => 24,
            ],
            [
                'descripcion' => 'El código fuente tiene comentarios explicativos',
                'identificadorEntre' => 24,
            ],
            [
                'descripcion' => 'La lista de requerimientos está completa',
                'identificadorEntre' => 25,
            ],
            [
                'descripcion' => 'Los requerimientos son relevantes para el usuario',
                'identificadorEntre' => 25,
            ],
            [
                'descripcion' => 'El Product Backlog está bien elaborado',
                'identificadorEntre' => 26,
            ],
            [
                'descripcion' => 'El Product Backlog está completo',
                'identificadorEntre' => 26,
            ],
            [
                'descripcion' => 'El software está libre de errores',
                'identificadorEntre' => 27,
            ],
            [
                'descripcion' => 'El software es intuitivo',
                'identificadorEntre' => 27,
            ],
            [
                'descripcion' => 'El manual de usuario incluye un glosario',
                'identificadorEntre' => 28,
            ],
            [
                'descripcion' => 'El manual de usuario incluye imágenes',
                'identificadorEntre' => 28,
            ],
            //Semestre I-2025           
            [
                'descripcion' => 'Los requerimientos expresan las necesidades del cliente',
                'identificadorEntre' => 29,
            ],
            [
                'descripcion' => 'El documento es legible',
                'identificadorEntre' => 29,
            ],
            [
                'descripcion' => 'Product Backlog completo',
                'identificadorEntre' => 30,
            ],
            [
                'descripcion' => 'El Product Backlog se corresponde con los requerimientos',
                'identificadorEntre' => 30,
            ],
            [
                'descripcion' => 'El producto hace lo que el cliente necesita',
                'identificadorEntre' => 31,
            ],
            [
                'descripcion' => 'El producto es robusto',
                'identificadorEntre' => 31,
            ],
            [
                'descripcion' => 'El código fuente sigue estándares',
                'identificadorEntre' => 32,
            ],
            [
                'descripcion' => 'El código fuente tiene comentarios explicativos',
                'identificadorEntre' => 32,
            ],
            [
                'descripcion' => 'La lista de requerimientos está completa',
                'identificadorEntre' => 33,
            ],
            [
                'descripcion' => 'Los requerimientos son relevantes para el usuario',
                'identificadorEntre' => 33,
            ],
            [
                'descripcion' => 'El Product Backlog está bien elaborado',
                'identificadorEntre' => 34,
            ],
            [
                'descripcion' => 'El Product Backlog está completo',
                'identificadorEntre' => 34,
            ],
            [
                'descripcion' => 'El software está libre de errores',
                'identificadorEntre' => 35,
            ],
            [
                'descripcion' => 'El software es intuitivo',
                'identificadorEntre' => 35,
            ],
            [
                'descripcion' => 'El manual de usuario incluye un glosario',
                'identificadorEntre' => 36,
            ],
            [
                'descripcion' => 'El manual de usuario incluye imágenes',
                'identificadorEntre' => 36,
            ]
        ]);
    }
}
