<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creo mis credenciales
        User::create([
            'name' => 'Roberto Chacón',
            'email' => 'robertochacon9514@hotmail.com',
            'password' => bcrypt('140495/rch*.*'),         
        ])->assignRole('Admin');

        // crear los registros falsos
        User::factory(9)->create(); // 80 registros falsos
    }
}

