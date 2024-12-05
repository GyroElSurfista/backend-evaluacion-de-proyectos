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
            [
                'identificadorUsuar' => 1,
                'identificadorGrupoEmpre' => 1,
            ],
            [
                'identificadorUsuar' => 2,
                'identificadorGrupoEmpre' => 1,
            ],
            [
                'identificadorUsuar' => 3,
                'identificadorGrupoEmpre' => 1,
            ],
            [
                'identificadorUsuar' => 4,
                'identificadorGrupoEmpre' => 1,
            ],
            [
                'identificadorUsuar' => 5,
                'identificadorGrupoEmpre' => 1,
            ],
            [
                'identificadorUsuar' => 6,
                'identificadorGrupoEmpre' => 2,
            ],
            [
                'identificadorUsuar' => 7,
                'identificadorGrupoEmpre' => 2,
            ],
            [
                'identificadorUsuar' => 8,
                'identificadorGrupoEmpre' => 2,
            ],
            [
                'identificadorUsuar' => 9,
                'identificadorGrupoEmpre' => 2,
            ],
            [
                'identificadorUsuar' => 10,
                'identificadorGrupoEmpre' => 2,
            ],
            [
                'identificadorUsuar' => 11,
                'identificadorGrupoEmpre' => 3,
            ],
            [
                'identificadorUsuar' => 12,
                'identificadorGrupoEmpre' => 3,
            ],
            [
                'identificadorUsuar' => 13,
                'identificadorGrupoEmpre' => 3,
            ],
            [
                'identificadorUsuar' => 14,
                'identificadorGrupoEmpre' => 3,
            ],
            [
                'identificadorUsuar' => 15,
                'identificadorGrupoEmpre' => 3,
            ],
            [
                'identificadorUsuar' => 16,
                'identificadorGrupoEmpre' => 4,
            ],
            [
                'identificadorUsuar' => 17,
                'identificadorGrupoEmpre' => 4,
            ],
            [
                'identificadorUsuar' => 18,
                'identificadorGrupoEmpre' => 4,
            ],
            [
                'identificadorUsuar' => 19,
                'identificadorGrupoEmpre' => 4,
            ],
            [
                'identificadorUsuar' => 20,
                'identificadorGrupoEmpre' => 4,
            ],
            [
                'identificadorUsuar' => 21,
                'identificadorGrupoEmpre' => 1,
            ],
            [
                'identificadorUsuar' => 21,
                'identificadorGrupoEmpre' => 2,
            ],
            [
                'identificadorUsuar' => 21,
                'identificadorGrupoEmpre' => 3,
            ],
            [
                'identificadorUsuar' => 21,
                'identificadorGrupoEmpre' => 4,
            ],
            [
                'identificadorUsuar' => 22,
                'identificadorGrupoEmpre' => 1,
            ],
            [
                'identificadorUsuar' => 22,
                'identificadorGrupoEmpre' => 2,
            ],
            [
                'identificadorUsuar' => 22,
                'identificadorGrupoEmpre' => 3,
            ],
            [
                'identificadorUsuar' => 22,
                'identificadorGrupoEmpre' => 4,
            ]
        ]);
    }
}
