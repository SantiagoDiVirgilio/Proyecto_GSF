<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deporte>
 */
class DeporteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cupos = fake()->numberBetween(10, 50);

        return [
            'nombre' => fake()->randomElement(['BASQUET', 'FUTBOL', 'TENIS', 'VOLLEY']),
            'descripcion' => fake()->text(200),
            'cupos' => $cupos,
            'inscriptos' => fake()->numberBetween(0, $cupos),
        ];
    }
}
