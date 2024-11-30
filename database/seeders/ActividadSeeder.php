<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Actividad')->insert([
            [
                'nombre' => 'Entrevistar al cliente',
                'fechaInici' => '2024-08-12',
                'fechaFin' => '2024-11-20',
                'identificadorUsua' => 3,
                'identificadorObjet' => 1,
            ],
            [
                'nombre' => 'Desarrolla producto',
                'fechaInici' => '2024-11-21',
                'fechaFin' => '2024-12-04',
                'identificadorUsua' => 4,
                'identificadorObjet' => 2,
            ],
            [
                'nombre' => 'Reunirse con el cliente',
                'fechaInici' => '2024-08-12',
                'fechaFin' => '2024-11-20',
                'identificadorUsua' => 7,
                'identificadorObjet' => 3,
            ],
            [
                'nombre' => 'Desarrollar funcionalidades',
                'fechaInici' => '2024-11-21',
                'fechaFin' => '2024-12-04',
                'identificadorUsua' => 8,
                'identificadorObjet' => 4,
            ],
            [
                'nombre' => 'Corregir bugs encontrados',
                'fechaInici' => '2024-12-05',
                'fechaFin' => '2024-12-11',
                'identificadorUsua' => 9,
                'identificadorObjet' => 5,
            ],
            // [
            //     'nombre' => 'Hablar con el cliente',
            //     'fechaInici' => '2025-02-12',
            //     'fechaFin' => '2025-03-05',
            //     'identificadorUsua' => 13,
            //     'identificadorObjet' => 6,
            // ],
            // [
            //     'nombre' => 'Desarrollar proyecto',
            //     'fechaInici' => '2025-03-06',
            //     'fechaFin' => '2025-04-02',
            //     'identificadorUsua' => 14,
            //     'identificadorObjet' => 7,
            // ],
            // [
            //     'nombre' => 'Captura de requisitos con el cliente',
            //     'fechaInici' => '2025-02-12',
            //     'fechaFin' => '2025-03-05',
            //     'identificadorUsua' => 16,
            //     'identificadorObjet' => 8,
            // ],
            // [
            //     'nombre' => 'Desarrollar proyecto',
            //     'fechaInici' => '2025-03-06',
            //     'fechaFin' => '2025-04-02',
            //     'identificadorUsua' => 17,
            //     'identificadorObjet' => 9,
            // ],
            //Another seeders
            [
                'nombre' => 'Entrevistar al cliente',
                'fechaInici' => '2024-08-12',
                'fechaFin' => '2024-08-28',
                'identificadorUsua' => 12,
                'identificadorObjet' => 6,
            ],
            [
                'nombre' => 'Desarrolla producto',
                'fechaInici' => '2024-08-29',
                'fechaFin' => '2024-12-04',
                'identificadorUsua' => 13,
                'identificadorObjet' => 7,
            ],
            [
                'nombre' => 'Reunirse con el cliente',
                'fechaInici' => '2024-08-12',
                'fechaFin' => '2024-08-28',
                'identificadorUsua' => 17,
                'identificadorObjet' => 8,
            ],
            [
                'nombre' => 'Desarrollar funcionalidades',
                'fechaInici' => '2024-08-29',
                'fechaFin' => '2024-10-16',
                'identificadorUsua' => 18,
                'identificadorObjet' => 9,
            ],
            [
                'nombre' => 'Corregir bugs encontrados',
                'fechaInici' => '2024-12-04',
                'fechaFin' => '2024-12-11',
                'identificadorUsua' => 19,
                'identificadorObjet' => 10,
            ],
            // [
            //     'nombre' => 'Hablar con el cliente',
            //     'fechaInici' => '2025-02-12',
            //     'fechaFin' => '2025-03-05',
            //     'identificadorUsua' => 40,
            //     'identificadorObjet' => 15,
            // ],
            // [
            //     'nombre' => 'Desarrollar proyecto',
            //     'fechaInici' => '2025-03-06',
            //     'fechaFin' => '2025-04-02',
            //     'identificadorUsua' => 41,
            //     'identificadorObjet' => 16,
            // ],
            // [
            //     'nombre' => 'Captura de requisitos con el cliente',
            //     'fechaInici' => '2025-02-12',
            //     'fechaFin' => '2025-03-05',
            //     'identificadorUsua' => 45,
            //     'identificadorObjet' => 17,
            // ],
            // [
            //     'nombre' => 'Desarrollar proyecto',
            //     'fechaInici' => '2025-03-06',
            //     'fechaFin' => '2025-04-02',
            //     'identificadorUsua' => 46,
            //     'identificadorObjet' => 18,
            // ]
        ]);
    }
}
