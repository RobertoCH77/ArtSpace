<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class ArtistsIndex extends Component
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

    public function showPosts(User $user)
    {
        $posts = $user->posts()->paginate(10); 

        return view('artist.posts', compact('user', 'posts'));
    }

    public function render()
    {
        //$artists = User::all();

        // recuperamos el registro del usuario, actualmente autenticado
        $artists = User::orderBy('name')
			->where('name', 'LIKE', '%' . $this->search . '%')
			->latest('id')
			->paginate(10);

        return view('livewire.users.artists-index', compact('artists'));
    }
}
