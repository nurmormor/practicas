<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno;
use App\Models\Unidad;

class AlumnoSeeder extends Seeder
{
    public function run()
    {
        $unidades = Unidad::all();

        // 🚨 Verificar si hay unidades de 1º disponibles antes de continuar
        $unidadesPrimero = $unidades->where('curso', 1);

        if ($unidadesPrimero->isEmpty()) {
            $this->command->info('No hay unidades de 1º disponibles. No se crearán alumnos.');
            return;
        }

        // Crear 20 alumnos de prueba
        Alumno::factory(20)->create()->each(function ($alumno) use ($unidadesPrimero, $unidades) {
            // Seleccionar una unidad aleatoria de 1º curso
            $unidadPrimero = $unidadesPrimero->random();

            // Buscar unidades de 2º curso con las mismas características (grado, turno, modalidad)
            $unidadesSegundo = $unidades->where('nombre_grado', $unidadPrimero->nombre_grado)
                                        ->where('turno', $unidadPrimero->turno)
                                        ->where('aula_bilingue', $unidadPrimero->aula_bilingue)
                                        ->where('curso', 2);

            // Verificar que haya unidades disponibles para 2º
            if ($unidadesSegundo->isNotEmpty()) {
                // Seleccionar una unidad de 2º aleatoria
                $unidadSegundo = $unidadesSegundo->random();

                // Asignar el alumno a 1º en 2024/25
                $alumno->unidades()->attach($unidadPrimero->id, [
                    'anio_inicio' => 2023,
                    'anio_fin' => 2024,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Asignar el alumno a 2º en 2025/26
                $alumno->unidades()->attach($unidadSegundo->id, [
                    'anio_inicio' => 2024,
                    'anio_fin' => 2025,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                // Si no hay unidades de 2º, solo asignar la de 1º
                $alumno->unidades()->attach($unidadPrimero->id, [
                    'anio_inicio' => 2024,
                    'anio_fin' => 2025,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Si no se asignó ninguna unidad, no se guarda el alumno
            if ($alumno->unidades->isEmpty()) {
                $alumno->delete();  // Eliminar el alumno si no tiene unidad asignada
                $this->command->warn("Alumno {$alumno->id} no tiene unidad asignada y se eliminó.");
            }
        });
    }
}
