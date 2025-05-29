<?php

namespace Database\Factories;
use App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresa>
 */
class EmpresaFactory extends Factory
{

    protected $model = Empresa::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->company, // Nombre aleatorio de la empresa
            'sector' => $this->faker->word, // Sector de la empresa
            'direccion' => $this->faker->address, // Dirección de la empresa
            'telefono' => $this->faker->phoneNumber, // Teléfono de contacto
            'email_contacto' => $this->faker->companyEmail, // Email de contacto
        ];
    }
}
