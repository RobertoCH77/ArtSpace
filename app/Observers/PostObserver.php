<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    public function creating(Post $post): void
    {
        if (! \App::runningInConsole()){
             // cada vez que se cree un nuevo post, se le  asigne al campo "user_id" el id del usuario autenticado
            $post->user_id = auth()->user()->id;
        }
    }

    public function deleting(Post $post): void
    {
        if ($post->image){
            // elimina archivos basura (imagen o video)
            Storage::disk('public')->delete($post->image->url);
            //Storage::delete($post->image->url);
        }
    }
}
