<?php

namespace App\Livewire;

use Livewire\Component;

class LikeButton extends Component
{
    public $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.like-button');
    }

    public function toggleLike()
    {
        $user = auth()->user();

        if ($user) {
            if ($this->post->likedBy($user)) {
                $this->post->unlike($user);
            } else {
                $this->post->like($user);
            }

            $this->post->refresh(); // Actualizar el modelo con los cambios
        } else {
            // Manejar el caso en el que el usuario no está autenticado
            session()->flash('message', 'Debes iniciar sesión para dar "Me gusta".');
        }
    }
}
