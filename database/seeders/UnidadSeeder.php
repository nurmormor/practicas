<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unidad;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lista de unidades con alias
        $unidades = [
            ['nombre_grado' => 'Sistemas Microinformáticos y Redes', 'turno' => 'diurno', 'curso' => 1, 'aula_bilingue' => false, 'alias' => 'SMR D 1º'],
            ['nombre_grado' => 'Sistemas Microinformáticos y Redes', 'turno' => 'diurno', 'curso' => 2, 'aula_bilingue' => false, 'alias' => 'SMR D 2º'],
            ['nombre_grado' => 'Actividades Comerciales', 'turno' => 'diurno', 'curso' => 1, 'aula_bilingue' => false, 'alias' => 'AC D 1º'],
            ['nombre_grado' => 'Actividades Comerciales', 'turno' => 'diurno', 'curso' => 2, 'aula_bilingue' => false, 'alias' => 'AC D 2º'],
            ['nombre_grado' => 'Desarrollo de Aplicaciones Multiplataforma', 'turno' => 'diurno', 'curso' => 1, 'aula_bilingue' => true, 'alias' => 'DAM D B 1º'],
            ['nombre_grado' => 'Desarrollo de Aplicaciones Multiplataforma', 'turno' => 'diurno', 'curso' => 2, 'aula_bilingue' => true, 'alias' => 'DAM D B 2º'],
            ['nombre_grado' => 'Transporte y Logística', 'turno' => 'diurno', 'curso' => 1, 'aula_bilingue' => false, 'alias' => 'TL D 1º'],
            ['nombre_grado' => 'Transporte y Logística', 'turno' => 'diurno', 'curso' => 2, 'aula_bilingue' => false, 'alias' => 'TL D 2º'],
            ['nombre_grado' => 'Sistemas Microinformáticos y Redes', 'turno' => 'tarde', 'curso' => 1, 'aula_bilingue' => false, 'alias' => 'SMR T 1º'],
            ['nombre_grado' => 'Sistemas Microinformáticos y Redes', 'turno' => 'tarde', 'curso' => 2, 'aula_bilingue' => false, 'alias' => 'SMR T 2º'],
            ['nombre_grado' => 'Desarrollo de Aplicaciones Web', 'turno' => 'tarde', 'curso' => 1, 'aula_bilingue' => false, 'alias' => 'DAW T 1º'],
            ['nombre_grado' => 'Desarrollo de Aplicaciones Web', 'turno' => 'tarde', 'curso' => 2, 'aula_bilingue' => false, 'alias' => 'DAW T 2º'],
            ['nombre_grado' => 'Desarrollo de Aplicaciones Web', 'turno' => 'tarde', 'curso' => 1, 'aula_bilingue' => true, 'alias' => 'DAW T B 1º'],
            ['nombre_grado' => 'Desarrollo de Aplicaciones Web', 'turno' => 'tarde', 'curso' => 2, 'aula_bilingue' => true, 'alias' => 'DAW T B 2º'],
            ['nombre_grado' => 'Comercio Internacional', 'turno' => 'tarde', 'curso' => 1, 'aula_bilingue' => false, 'alias' => 'CI T 1º'],
            ['nombre_grado' => 'Comercio Internacional', 'turno' => 'tarde', 'curso' => 2, 'aula_bilingue' => false, 'alias' => 'CI T 2º'],
            ['nombre_grado' => 'Comercio Internacional', 'turno' => 'tarde', 'curso' => 1, 'aula_bilingue' => true, 'alias' => 'CI T B 1º'],
            ['nombre_grado' => 'Comercio Internacional', 'turno' => 'tarde', 'curso' => 2, 'aula_bilingue' => true, 'alias' => 'CI T B 2º'],
            ['nombre_grado' => 'Transporte y Logística', 'turno' => 'tarde', 'curso' => 1, 'aula_bilingue' => false, 'alias' => 'TL T 1º'],
            ['nombre_grado' => 'Transporte y Logística', 'turno' => 'tarde', 'curso' => 2, 'aula_bilingue' => false, 'alias' => 'TL T 2º'],
            ['nombre_grado' => 'Proyecto Piloto Transporte y Logística', 'turno' => 'tarde', 'curso' => 1, 'aula_bilingue' => true, 'alias' => 'PPTL T B 1º'],
            ['nombre_grado' => 'Proyecto Piloto Transporte y Logística', 'turno' => 'tarde', 'curso' => 2, 'aula_bilingue' => true, 'alias' => 'PPTL T B 2º'],
            ['nombre_grado' => 'Proyecto Piloto Transporte y Logística', 'turno' => 'tarde', 'curso' => 3, 'aula_bilingue' => true, 'alias' => 'PPTL T B 3º'],
        ];

        // Insertar usando el modelo
        foreach ($unidades as $unidad) {
            Unidad::create($unidad);
        }
    }
}
