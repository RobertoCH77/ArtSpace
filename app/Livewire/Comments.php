<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Livewire\WithPagination;

class Comments extends Component
{
    // para mostrar la paginacion
    use WithPagination;

    // mostrar los estilos de bootstrap
    protected $paginationTheme = "bootstrap";

    public $comments;
    public $message;
    public $post;
    public $editingCommentId; 

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->comments = $post->comments()->latest()->get();
    }

    public function storeComment()
    {
        // Validación: Asegúrate de que el campo 'message' no esté vacío
        $this->validate([
            'message' => 'required|min:1', // Puedes ajustar min según tus necesidades
        ]);

        // Verifica si el usuario está autenticado antes de crear un comentario
        if (Auth::check()) {
            $this->post->comments()->create([
                'message' => $this->message,
                'user_id' => Auth::id(),
            ]);

            $this->message = null;

            // Actualizar los comentarios después de agregar uno nuevo
            $this->comments = $this->post->comments()->latest()->get();
        } else {
            // Puedes establecer un mensaje de error o redirigir al usuario a la página de inicio de sesión
            session()->flash('error', 'Debes iniciar sesión para comentar.');
            // Opción de redirección a la página de inicio de sesión
            // return redirect()->route('login');
        }
    }

    public function editComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        // Verificar si el usuario actual es el propietario del comentario
        if ($comment->user_id === Auth::id()) {
            $this->editingCommentId = $commentId;
        } else {
            session()->flash('error', 'No tienes permisos para editar este comentario.');
        }
    }

    public function updateComment()
    {
        // Validar el mensaje actualizado
        $this->validate([
            'message' => 'required|min:1',
        ]);

        // Actualizar el comentario
        Comment::find($this->editingCommentId)->update([
            'message' => $this->message,
        ]);

        // Limpiar el formulario de edición
        $this->cancelEdit();
    }

    public function cancelEdit()
    {
        // Limpiar el formulario de edición y el comentario en edición
        $this->message = null;
        $this->editingCommentId = null;
    }

    public function deleteComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        // Verificar si el usuario actual es el propietario del comentario
        if ($comment->user_id === Auth::id()) {
            // Eliminar el comentario
            Comment::destroy($commentId);

            // Recargar la lista de comentarios después de eliminar
            $this->comments = $this->post->comments()->latest()->get();
        } else {
            session()->flash('error', 'No tienes permisos para eliminar este comentario.');
        }
    }
    public function render()
    {
        $this->comments = $this->post->comments()->latest()->get();
        return view('livewire.comments');
    }
}
