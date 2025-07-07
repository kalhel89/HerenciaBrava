<?php
namespace Database\Factories;

use App\Models\Propietario;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropietarioFactory extends Factory
{
    protected $model = Propietario::class;

    public function definition(): array
    {
        return [
            'nombre'   => $this->faker->name,
            'correo'   => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
        ];
    }
} 
