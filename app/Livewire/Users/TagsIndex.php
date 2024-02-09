<?php

namespace App\Livewire\Users;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class TagsIndex extends Component
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

    public function getPostCount($tagId)
    {
        return Tag::find($tagId)->posts()->where('status', 2)->count();
    }

    public function render()
    {
        // recuperamos el registro del usuario, actualmente autenticado
        $tagAll = Tag::orderBy('name')
			->where('name', 'LIKE', '%' . $this->search . '%')
			->latest('id')
			->paginate(10);

        return view('livewire.users.tags-index', compact('tagAll'));
    }
}
