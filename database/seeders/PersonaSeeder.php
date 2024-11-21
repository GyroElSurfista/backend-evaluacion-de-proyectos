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
            ['nombre' => 'Juan', 'apellido' => 'Pérez'],
            ['nombre' => 'María', 'apellido' => 'González'],
            ['nombre' => 'Carlos', 'apellido' => 'Rodríguez'],
            ['nombre' => 'Ana', 'apellido' => 'Martínez'],
            ['nombre' => 'Luis', 'apellido' => 'Fernández'],
            ['nombre' => 'Pedro', 'apellido' => 'López'],
            ['nombre' => 'Sofía', 'apellido' => 'Moreno'],
            ['nombre' => 'Daniel', 'apellido' => 'Gómez'],
            ['nombre' => 'Lucía', 'apellido' => 'Ramos'],
            ['nombre' => 'Javier', 'apellido' => 'Torres'],
            ['nombre' => 'Elena', 'apellido' => 'Sánchez'],
            ['nombre' => 'Miguel', 'apellido' => 'Díaz'],
            ['nombre' => 'Laura', 'apellido' => 'Hernández'],
            ['nombre' => 'Fernando', 'apellido' => 'Ruiz'],
            ['nombre' => 'Isabel', 'apellido' => 'Molina'],
            ['nombre' => 'Pablo', 'apellido' => 'Jiménez'],
            ['nombre' => 'Carmen', 'apellido' => 'Vega'],
            ['nombre' => 'Ricardo', 'apellido' => 'Navarro'],
            ['nombre' => 'Verónica', 'apellido' => 'Castro'],
        ]);
    }
}
