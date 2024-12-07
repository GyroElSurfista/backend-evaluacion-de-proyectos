<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemestreUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('SemestreUsuario')->insert([
            // SEMESTRE I-2024
            // Docentes
            [
                'identificadorUsuar' => 1,
                'identificadorSemes' => 1,
            ],
            [
                'identificadorUsuar' => 2,
                'identificadorSemes' => 1,
            ],
            // Estudiantes
            [
                'identificadorUsuar' => 6,
                'identificadorSemes' => 1,
            ],
            [
                'identificadorUsuar' => 7,
                'identificadorSemes' => 1,
            ],
            [
                'identificadorUsuar' => 8,
                'identificadorSemes' => 1,
            ],
            [
                'identificadorUsuar' => 9,
                'identificadorSemes' => 1,
            ],
            [
                'identificadorUsuar' => 10,
                'identificadorSemes' => 1,
            ],
            [
                'identificadorUsuar' => 11,
                'identificadorSemes' => 1,
            ],
            [
                'identificadorUsuar' => 12,
                'identificadorSemes' => 1,
            ],
            [
                'identificadorUsuar' => 13,
                'identificadorSemes' => 1,
            ],
            [
                'identificadorUsuar' => 14,
                'identificadorSemes' => 1,
            ],
            [
                'identificadorUsuar' => 15,
                'identificadorSemes' => 1,
            ],


            // SEMESTRE II-2024
            // Docentes
            [
                'identificadorUsuar' => 1,
                'identificadorSemes' => 2,
            ],
            [
                'identificadorUsuar' => 2,
                'identificadorSemes' => 2,
            ],
            // Estudiantes
            [
                'identificadorUsuar' => 16,
                'identificadorSemes' => 2,
            ],
            [
                'identificadorUsuar' => 17,
                'identificadorSemes' => 2,
            ],
            [
                'identificadorUsuar' => 18,
                'identificadorSemes' => 2,
            ],
            [
                'identificadorUsuar' => 19,
                'identificadorSemes' => 2,
            ],
            [
                'identificadorUsuar' => 20,
                'identificadorSemes' => 2,
            ],
            [
                'identificadorUsuar' => 21,
                'identificadorSemes' => 2,
            ],
            [
                'identificadorUsuar' => 22,
                'identificadorSemes' => 2,
            ],
            [
                'identificadorUsuar' => 23,
                'identificadorSemes' => 2,
            ],
            [
                'identificadorUsuar' => 24,
                'identificadorSemes' => 2,
            ],
            [
                'identificadorUsuar' => 25,
                'identificadorSemes' => 2,
            ],

            // SEMESTRE III-2024
            // Docentes
            [
                'identificadorUsuar' => 1,
                'identificadorSemes' => 3,
            ],
            [
                'identificadorUsuar' => 2,
                'identificadorSemes' => 3,
            ],
            // Estudiantes
            [
                'identificadorUsuar' => 26,
                'identificadorSemes' => 3,
            ],
            [
                'identificadorUsuar' => 27,
                'identificadorSemes' => 3,
            ],
            [
                'identificadorUsuar' => 28,
                'identificadorSemes' => 3,
            ],
            [
                'identificadorUsuar' => 29,
                'identificadorSemes' => 3,
            ],
            [
                'identificadorUsuar' => 30,
                'identificadorSemes' => 3,
            ],
            [
                'identificadorUsuar' => 31,
                'identificadorSemes' => 3,
            ],
            [
                'identificadorUsuar' => 32,
                'identificadorSemes' => 3,
            ],
            [
                'identificadorUsuar' => 33,
                'identificadorSemes' => 3,
            ],
            [
                'identificadorUsuar' => 34,
                'identificadorSemes' => 3,
            ],
            [
                'identificadorUsuar' => 35,
                'identificadorSemes' => 3,
            ],

            // SEMESTRE IV-2024
            // Docentes
            [
                'identificadorUsuar' => 1,
                'identificadorSemes' => 4,
            ],
            [
                'identificadorUsuar' => 2,
                'identificadorSemes' => 4,
            ],
            // Estudiantes
            [
                'identificadorUsuar' => 36,
                'identificadorSemes' => 4,
            ],
            [
                'identificadorUsuar' => 37,
                'identificadorSemes' => 4,
            ],
            [
                'identificadorUsuar' => 38,
                'identificadorSemes' => 4,
            ],
            [
                'identificadorUsuar' => 39,
                'identificadorSemes' => 4,
            ],
            [
                'identificadorUsuar' => 40,
                'identificadorSemes' => 4,
            ],
            [
                'identificadorUsuar' => 41,
                'identificadorSemes' => 4,
            ],
            [
                'identificadorUsuar' => 42,
                'identificadorSemes' => 4,
            ],
            [
                'identificadorUsuar' => 43,
                'identificadorSemes' => 4,
            ],
            [
                'identificadorUsuar' => 44,
                'identificadorSemes' => 4,
            ],
            [
                'identificadorUsuar' => 45,
                'identificadorSemes' => 4,
            ],

            // SEMESTRE I-2025 (NO HAY ESTUDIANTES SOLO DOCENTES)
            // Docentes
            [
                'identificadorUsuar' => 1,
                'identificadorSemes' => 5,
            ],
            [
                'identificadorUsuar' => 2,
                'identificadorSemes' => 5,
            ],
        ]);
    }
}
