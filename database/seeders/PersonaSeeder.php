<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Persona')->insert([
            [
                'nombre' => 'Juan',
                'apellido' => 'Pérez',
            ],
            [
                'nombre' => 'María',
                'apellido' => 'González',
            ],
            [
                'nombre' => 'Carlos',
                'apellido' => 'Rodríguez',
            ],
            [
                'nombre' => 'Ana',
                'apellido' => 'Martínez',
            ],
            [
                'nombre' => 'Luis',
                'apellido' => 'Fernández',
            ],
        ]);
    }
}