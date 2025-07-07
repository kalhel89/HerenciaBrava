<?php

namespace Database\Factories;

use App\Models\Toro;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Propietario;

class ToroFactory extends Factory
{
    protected $model = Toro::class;

    public function definition(): array
    {
        return [
            'nombre'         => $this->faker->firstName,
            'edad'           => $this->faker->numberBetween(2, 10),
            'peso'           => $this->faker->numberBetween(400, 700),
            'categoria'      => $this->faker->randomElement(['A', 'B', 'C']),
            'ranking'        => $this->faker->numberBetween(0, 100),
            'propietario_id' => Propietario::factory(),
        ];
    }
}

