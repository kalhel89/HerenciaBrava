<?php

namespace Database\Factories;

use App\Models\Evento;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventoFactory extends Factory
{
    protected $model = Evento::class;

    public function definition(): array
    {
        return [
            'nombre'      => 'Evento ' . $this->faker->word,
            'fecha'       => $this->faker->dateTimeBetween('+1 days', '+1 year'),
            'lugar'       => $this->faker->city,
            'descripcion' => $this->faker->sentence,
        ];
    }
}
