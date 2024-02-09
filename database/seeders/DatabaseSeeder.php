<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use  Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Para que se borren las imagenes cada vez que ejecute el comando "php artisan migrate:fresh --seed"
        Storage::deleteDirectory('posts'); // elimna la carpeta "posts"  
        Storage::makeDirectory('posts'); // Crea la carpeta posts dentro de la carpeta storage

        // para que los registros de RoleSeeder se almacenen en la base de datos
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);
        Category::factory(7)->create(); // crea 7 categorias
        Tag::factory(15)->create(); // crea 15 etiquetas

        // Se descarga nuevamente las imagenes
        $this->call(PostSeeder::class); // por cada post que se cree, se crea una imagen
    }
}
