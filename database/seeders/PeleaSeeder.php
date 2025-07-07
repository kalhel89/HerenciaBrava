<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelea;

class PeleaSeeder extends Seeder
{
    public function run(): void
    {
        // 5 peleas distribuidas en los eventos ya creados
        Pelea::factory(5)->create();
    }
}
