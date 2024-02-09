<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use App\Models\Post;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    // para mostrar la paginacion
    use WithPagination;

    // mostrar los estilos de bootstrap
    protected $paginationTheme = "bootstrap";

    public $search;

    // para que cuando se este buscando se resetee la ruta
    public function updatingSearch()
	{
		$this->resetPage();
	}
    
    public function render()
    {
        // recuperamos el registro del usuario, actualmente autenticado
        $posts = Post::where('user_id', auth()->user()->id)
			->where('name', 'LIKE', '%' . $this->search . '%')
			->latest('id')
			->paginate();

        return view('livewire.admin.posts-index', compact('posts'));
    }
}
