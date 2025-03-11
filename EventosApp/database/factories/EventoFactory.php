<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombreEvento' => $this->faker->sentence(3),
            'fechaInicio' => $this->faker->date(),
            'fechaFin' => $this->faker->date(),
            'tipo' => $this->faker->randomElement(['reunión', 'conferencia', 'taller', 'presentación', 'concierto']),
            'participantes' => $this->faker->numberBetween(10, 500),
            'descripcion' => $this->faker->paragraph(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
