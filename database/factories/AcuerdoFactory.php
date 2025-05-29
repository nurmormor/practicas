<?php

namespace Database\Factories;
use App\Models\Acuerdo;
use App\Models\Alumno;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acuerdo>
 */
class AcuerdoFactory extends Factory
{
    protected $model = Acuerdo::class;

    public function definition(): array
    {
        return [
            'alumno_id' => Alumno::inRandomOrder()->first()->id, // Toma un alumno aleatorio
            'empresa_id' => Empresa::inRandomOrder()->first()->id, // Toma una empresa aleatoria
            'objetivo' => $this->faker->sentence, // Descripción del objetivo
            'tutor' => $this->faker->name, // Nombre del tutor de la empresa
            'observaciones' => $this->faker->text, // Comentarios adicionales
            'fecha_inicio' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'), // Fecha de inicio con formato correcto
            'fecha_fin' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'), // Fecha de fin con formato correcto
        ];
    }
}
