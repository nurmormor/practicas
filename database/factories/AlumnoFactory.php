<?php
namespace Database\Factories;

use App\Models\Alumno;
use App\Models\Unidad;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoFactory extends Factory
{
    protected $model = Alumno::class;

    public function definition(): array
    {
        // Selecciona UNA SOLA unidad para cada alumno
        $unidad = Unidad::inRandomOrder()->first();

        return [
            'nombre' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'telefono' => $this->faker->phoneNumber,

        ];
    }
}

