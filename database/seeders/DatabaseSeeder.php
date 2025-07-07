<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PropietarioSeeder::class,
            EventoSeeder::class,
            PeleaSeeder::class,
        ]);
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@toros.com',
            'password' => bcrypt('admin123'),
            'rol' => 'admin',      // ← ADMIN
        ]);

        User::create([
            'name' => 'Kalhel',
            'email' => 'kalhelgomes65@gmail.com',
            'password' => bcrypt('12345678'),
            'rol' => 'admin',      // ← ADMIN
        ]);

        User::create([
            'name' => 'Usuario común',
            'email' => 'usuario@toros.com',
            'password' => bcrypt('usuario123'),
            'rol' => 'usuario',    // ← NORMAL
        ]);
    }
}
