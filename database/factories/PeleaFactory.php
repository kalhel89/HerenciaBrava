<?php

namespace Database\Factories;

use App\Models\Pelea;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Evento;
use App\Models\Toro;

class PeleaFactory extends Factory
{
    protected $model = Pelea::class;

    public function definition(): array
    {
        $toro1   = Toro::factory()->create();
        $toro2   = Toro::factory()->create();
        $ganador = $this->faker->boolean ? $toro1 : $toro2;

        return [
            'evento_id'    => Evento::factory(),
            'toro_1_id'    => $toro1->id,
            'toro_2_id'    => $toro2->id,
            'ganador_id'   => $ganador->id,
            'observaciones'=> 'Sin incidentes.',
        ];
    }
}
