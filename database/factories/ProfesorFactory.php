<?php

namespace Database\Factories;

use App\Models\Profesor;
use App\Models\Unidad;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesorFactory extends Factory
{
    protected $model = Profesor::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
        ];
    }
}
