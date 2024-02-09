<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;
use Livewire\WithPagination;

class VerifyPost extends Component
{
    use WithPagination;

    public $searchUser;
    public $searchPost;
    public $selectedUserId;
    public $selectedUserName;

    protected $paginationTheme = 'bootstrap';

    // para que cuando se este buscando se resetee la ruta
    public function updatingSearch() {
        $this->resetPage();
    }

    // Método para cargar los posts del usuario seleccionado
    public function loadUserPosts($userId)
    {
        $this->selectedUserId = $userId;
        $user = User::find($userId);

        if ($user) {
            $this->selectedUserName = $user->name;
        } else {
            $this->selectedUserName = '';
        }
        $this->resetPage();
    }

     // Método para eliminar un post
    public function deletePost($postId)
    {
        $post = Post::find($postId);

        if ($post) {
            $post->delete();
            session()->flash('info', 'El post se eliminó con éxito.');
        }
        $this->resetPage();
    }

    public function render()
    {
        // PARA USUARIOS
        $usersQuery = User::query();

        // Aplicar la búsqueda en el nombre o email del usuario
        $users = $usersQuery->where('name', 'LIKE', '%' . $this->searchUser . '%')
            ->orWhere('email', 'LIKE', '%' . $this->searchUser . '%')
            ->paginate(5, ['*'], 'userPage'); // Nombre único para la paginación de usuarios

        $postsQuery = Post::query();

        // Filtrar por nombre de usuario si se ha seleccionado uno
        if ($this->selectedUserId) {
            $postsQuery->where('user_id', $this->selectedUserId);
        }

        // Aplicar la búsqueda en el nombre del post
        $posts = $postsQuery->where('name', 'LIKE', '%' . $this->searchPost . '%')
            ->latest('id')
            ->paginate(null, ['*'], 'postPage'); // Nombre único para la paginación de posts

        return view('livewire.admin.verify-post', compact('users', 'posts'));
    }
}
