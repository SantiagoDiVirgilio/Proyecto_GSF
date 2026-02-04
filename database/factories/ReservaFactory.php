<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Cancha;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reserva>
 */
class ReservaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'cancha_id' => Cancha::factory(),
            'fecha' => fake()->dateTimeBetween('now', date('Y') . '-12-25')->format('Y-m-d'),
            'hora' => sprintf('%02d:00:00', fake()->numberBetween(8, 23)),
            'estado' => fake()->randomElement(['confirmada', 'reservada']),
        ];
    }
}
