<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    // regla de autorizacion para verificar si un usuario es el autor de un post 
    public function author(User $user, Post $post) {
        if ($user->id == $post->user_id) {
            return true;
        } else {
            return false;
        }
    }

    // regla de autorizacion para evitar acceso a un post en estado borrador
    // ?User -> ? es opcional
    public function published(?User $user, Post $post) {
        if ($post->status == 2) {
            return true;
        } else {
            return false;
        }
    }
}
