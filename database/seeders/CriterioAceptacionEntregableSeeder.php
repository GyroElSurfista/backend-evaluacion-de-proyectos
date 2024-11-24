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
                'descripcion' => 'Los requerimientos expresan las necesidades del cliente',
                'identificadorEntre' => 11,
            ],
            [
                'descripcion' => 'El documento es legible',
                'identificadorEntre' => 11,
            ],
            [
                'descripcion' => 'Product Backlog completo',
                'identificadorEntre' => 12,
            ],
            [
                'descripcion' => 'El Product Backlog se corresponde con los requerimientos',
                'identificadorEntre' => 12,
            ],
            [
                'descripcion' => 'El producto hace lo que el cliente necesita',
                'identificadorEntre' => 13,
            ],
            [
                'descripcion' => 'El producto es robusto',
                'identificadorEntre' => 13,
            ],
            [
                'descripcion' => 'El código fuente sigue estándares',
                'identificadorEntre' => 14,
            ],
            [
                'descripcion' => 'El código fuente tiene comentarios explicativos',
                'identificadorEntre' => 14,
            ],
            [
                'descripcion' => 'La lista de requerimientos está completa',
                'identificadorEntre' => 15,
            ],
            [
                'descripcion' => 'Los requerimientos son relevantes para el usuario',
                'identificadorEntre' => 15,
            ],
            [
                'descripcion' => 'El Product Backlog está bien elaborado',
                'identificadorEntre' => 16,
            ],
            [
                'descripcion' => 'El Product Backlog está completo',
                'identificadorEntre' => 16,
            ],
            [
                'descripcion' => 'El software está libre de errores',
                'identificadorEntre' => 17,
            ],
            [
                'descripcion' => 'El software es intuitivo',
                'identificadorEntre' => 17,
            ],
            [
                'descripcion' => 'El manual de usuario incluye un glosario',
                'identificadorEntre' => 18,
            ],
            [
                'descripcion' => 'El manual de usuario incluye imágenes',
                'identificadorEntre' => 18,
            ],
            //Another seeders
            [
                'descripcion' => 'Legibilidad',
                'identificadorEntre' => 19,
            ],
            [
                'descripcion' => 'Correctitud',
                'identificadorEntre' => 19,
            ],
            [
                'descripcion' => 'Product backlog completo',
                'identificadorEntre' => 20,
            ],
            [
                'descripcion' => 'Product backlog priorizado',
                'identificadorEntre' => 20,
            ],
            [
                'descripcion' => 'Funciona correctamente',
                'identificadorEntre' => 21,
            ],
            [
                'descripcion' => 'Es fácil de usar',
                'identificadorEntre' => 21,
            ],
            [
                'descripcion' => 'Legibilidad',
                'identificadorEntre' => 22,
            ],
            [
                'descripcion' => 'Usabilidad',
                'identificadorEntre' => 22,
            ],
            [
                'descripcion' => 'El documento es claro',
                'identificadorEntre' => 23,
            ],
            [
                'descripcion' => 'El documento está bien estructurado',
                'identificadorEntre' => 23,
            ],
            [
                'descripcion' => 'Incluye las necesidades primordiales',
                'identificadorEntre' => 24,
            ],
            [
                'descripcion' => 'Las historias de usuario están bien redactadas',
                'identificadorEntre' => 24,
            ],
            [
                'descripcion' => 'El software hace lo que el usuario quiere',
                'identificadorEntre' => 25,
            ],
            [
                'descripcion' => 'El software es fácil de usar',
                'identificadorEntre' => 25,
            ],
            [
                'descripcion' => 'El manual de instalación es fácil de seguir',
                'identificadorEntre' => 26,
            ],
            [
                'descripcion' => 'El manual de instalación está completo',
                'identificadorEntre' => 26,
            ],
            [
                'descripcion' => 'Los bugs han sido correctamente reportados',
                'identificadorEntre' => 27,
            ],
            [
                'descripcion' => 'El documento es legible',
                'identificadorEntre' => 27,
            ],
            [
                'descripcion' => 'Tiempo de respuesta de la interfaz menor a 3 segundos',
                'identificadorEntre' => 28,
            ],
            [
                'descripcion' => 'Diseño responsivo en todos los navegadores',
                'identificadorEntre' => 28,
            ],
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
