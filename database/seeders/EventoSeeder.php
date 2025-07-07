<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evento;

class EventoSeeder extends Seeder
{
    public function run(): void
    {
        // 3 eventos futuros
        Evento::factory(3)->create();
    }
}

