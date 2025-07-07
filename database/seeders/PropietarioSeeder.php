<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Propietario;

class PropietarioSeeder extends Seeder
{
    public function run(): void
    {
        // 5 propietarios cada uno con 3 toros mediante factory relationship
        Propietario::factory(5)->hasToros(3)->create();
    }
}

