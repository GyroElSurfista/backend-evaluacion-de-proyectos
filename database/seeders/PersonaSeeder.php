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
            //Another seeders
            ['nombre' => 'Andrés', 'apellido' => 'Ortiz'],
            ['nombre' => 'Patricia', 'apellido' => 'Silva'],
            ['nombre' => 'Roberto', 'apellido' => 'Mendoza'],
            ['nombre' => 'Gabriela', 'apellido' => 'Romero'],
            ['nombre' => 'Francisco', 'apellido' => 'Iglesias'],
            ['nombre' => 'Marta', 'apellido' => 'Cabrera'],
            ['nombre' => 'Alberto', 'apellido' => 'Rojas'],
            ['nombre' => 'Cristina', 'apellido' => 'Flores'],
            ['nombre' => 'Jorge', 'apellido' => 'Castillo'],
            ['nombre' => 'Natalia', 'apellido' => 'Soto'],
            ['nombre' => 'Raúl', 'apellido' => 'Paredes'],
            ['nombre' => 'Adriana', 'apellido' => 'Campos'],
            ['nombre' => 'Enrique', 'apellido' => 'Vargas'],
            ['nombre' => 'Lorena', 'apellido' => 'Peña'],
            ['nombre' => 'Sergio', 'apellido' => 'Guerrero'],
            ['nombre' => 'Valeria', 'apellido' => 'Méndez'],
            ['nombre' => 'Héctor', 'apellido' => 'Cruz'],
            ['nombre' => 'Alicia', 'apellido' => 'Reyes'],
            ['nombre' => 'Gustavo', 'apellido' => 'Herrera'],
            ['nombre' => 'Claudia', 'apellido' => 'Aguilar'],
            ['nombre' => 'Eduardo', 'apellido' => 'Salazar'],
            ['nombre' => 'Rosa', 'apellido' => 'Rivas'],
            ['nombre' => 'Manuel', 'apellido' => 'Guzmán'],
            ['nombre' => 'Teresa', 'apellido' => 'Muñoz'],
            ['nombre' => 'Ángel', 'apellido' => 'Ponce'],
            ['nombre' => 'Silvia', 'apellido' => 'Delgado'],
            ['nombre' => 'Ramón', 'apellido' => 'Morales'],
            ['nombre' => 'Julia', 'apellido' => 'Ortega'],
            ['nombre' => 'Tomás', 'apellido' => 'Vargas'],
            ['nombre' => 'Beatriz', 'apellido' => 'Serrano'],
            ['nombre' => 'Lorena', 'apellido' => 'Serrano'],
        ]);
    }
}
