<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoEmpresaUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('GrupoEmpresaUsuario')->insert([
            // Docentes
            // SEMESTRE I-2024
            [
                'identificadorUsuar' => 1,
                'identificadorGrupoEmpre' => 1,
            ],
            [
                'identificadorUsuar' => 2,
                'identificadorGrupoEmpre' => 2,
            ],
            // SEMESTRE II-2024
            [
                'identificadorUsuar' => 1,
                'identificadorGrupoEmpre' => 3,
            ],
            [
                'identificadorUsuar' => 1,
                'identificadorGrupoEmpre' => 4,
            ],
            // SEMESTRE III-2024
            [
                'identificadorUsuar' => 2,
                'identificadorGrupoEmpre' => 5,
            ],
            [
                'identificadorUsuar' => 2,
                'identificadorGrupoEmpre' => 6,
            ],
            // SEMESTRE IV-2024
            [
                'identificadorUsuar' => 1,
                'identificadorGrupoEmpre' => 7,
            ],
            [
                'identificadorUsuar' => 1,
                'identificadorGrupoEmpre' => 8,
            ],

            // Estudiantes
            // SEMESTRE I-2024
            [
                'identificadorUsuar' => 6,
                'identificadorGrupoEmpre' => 1,
            ],
            [
                'identificadorUsuar' => 7,
                'identificadorGrupoEmpre' => 1,
            ],
            [
                'identificadorUsuar' => 8,
                'identificadorGrupoEmpre' => 1,
            ],
            [
                'identificadorUsuar' => 9,
                'identificadorGrupoEmpre' => 1,
            ],
            [
                'identificadorUsuar' => 10,
                'identificadorGrupoEmpre' => 1,
            ],
            [
                'identificadorUsuar' => 11,
                'identificadorGrupoEmpre' => 2,
            ],
            [
                'identificadorUsuar' => 12,
                'identificadorGrupoEmpre' => 2,
            ],
            [
                'identificadorUsuar' => 13,
                'identificadorGrupoEmpre' => 2,
            ],
            [
                'identificadorUsuar' => 14,
                'identificadorGrupoEmpre' => 2,
            ],
            [
                'identificadorUsuar' => 15,
                'identificadorGrupoEmpre' => 2,
            ],

            // SEMESTRE II-2024
            [
                'identificadorUsuar' => 16,
                'identificadorGrupoEmpre' => 3,
            ],
            [
                'identificadorUsuar' => 17,
                'identificadorGrupoEmpre' => 3,
            ],
            [
                'identificadorUsuar' => 18,
                'identificadorGrupoEmpre' => 3,
            ],
            [
                'identificadorUsuar' => 19,
                'identificadorGrupoEmpre' => 3,
            ],
            [
                'identificadorUsuar' => 20,
                'identificadorGrupoEmpre' => 3,
            ],
            [
                'identificadorUsuar' => 21,
                'identificadorGrupoEmpre' => 4,
            ],
            [
                'identificadorUsuar' => 22,
                'identificadorGrupoEmpre' => 4,
            ],
            [
                'identificadorUsuar' => 23,
                'identificadorGrupoEmpre' => 4,
            ],
            [
                'identificadorUsuar' => 24,
                'identificadorGrupoEmpre' => 4,
            ],
            [
                'identificadorUsuar' => 25,
                'identificadorGrupoEmpre' => 4,
            ],

            // SEMESTRE III-2024
            [
                'identificadorUsuar' => 26,
                'identificadorGrupoEmpre' => 5,
            ],
            [
                'identificadorUsuar' => 27,
                'identificadorGrupoEmpre' => 5,
            ],
            [
                'identificadorUsuar' => 28,
                'identificadorGrupoEmpre' => 5,
            ],
            [
                'identificadorUsuar' => 29,
                'identificadorGrupoEmpre' => 5,
            ],
            [
                'identificadorUsuar' => 30,
                'identificadorGrupoEmpre' => 5,
            ],
            [
                'identificadorUsuar' => 31,
                'identificadorGrupoEmpre' => 6,
            ],
            [
                'identificadorUsuar' => 32,
                'identificadorGrupoEmpre' => 6,
            ],
            [
                'identificadorUsuar' => 33,
                'identificadorGrupoEmpre' => 6,
            ],
            [
                'identificadorUsuar' => 34,
                'identificadorGrupoEmpre' => 6,
            ],
            [
                'identificadorUsuar' => 35,
                'identificadorGrupoEmpre' => 6,
            ],

            // SEMESTRE IV-2024
            [
                'identificadorUsuar' => 36,
                'identificadorGrupoEmpre' => 7,
            ],
            [
                'identificadorUsuar' => 37,
                'identificadorGrupoEmpre' => 7,
            ],
            [
                'identificadorUsuar' => 38,
                'identificadorGrupoEmpre' => 7,
            ],
            [
                'identificadorUsuar' => 39,
                'identificadorGrupoEmpre' => 7,
            ],
            [
                'identificadorUsuar' => 40,
                'identificadorGrupoEmpre' => 7,
            ],
            [
                'identificadorUsuar' => 41,
                'identificadorGrupoEmpre' => 8,
            ],
            [
                'identificadorUsuar' => 42,
                'identificadorGrupoEmpre' => 8,
            ],
            [
                'identificadorUsuar' => 43,
                'identificadorGrupoEmpre' => 8,
            ],
            [
                'identificadorUsuar' => 44,
                'identificadorGrupoEmpre' => 8,
            ],
            [
                'identificadorUsuar' => 45,
                'identificadorGrupoEmpre' => 8,
            ],
        ]);
    }
}
