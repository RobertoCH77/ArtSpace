<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Image;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::factory(100)->create();

        // Por cada post que se genere, se descarga una imagen con su informacion y se almacene en la tabla "image"
        foreach ($posts as $post){
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class,
            ]);

            // ingresar datos en la tabla intermedia (dos etiquetas a cada post)
            $post->tags()->attach([
                rand(1,4),
                rand(5,8)
            ]);
        }
    }
}
