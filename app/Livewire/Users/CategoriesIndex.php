<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\User;

class CategoriesIndex extends Component
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

    // public function showCategories(User $user)
    // {
    //     $categories = $user->posts()->paginate(10);  

    //     return view('artist.posts', compact('user', 'categories'));
    // }

    public function getCategoryCount($categoryId)
    {
        return Category::find($categoryId)->posts()->where('status', 2)->count();
    }

    public function render()
    {
        // recuperamos el registro del usuario, actualmente autenticado
        $categoriesAll = Category::orderBy('name')
			->where('name', 'LIKE', '%' . $this->search . '%')
			->latest('id')
			->paginate(10);

        return view('livewire.users.categories-index', compact('categoriesAll'));
    }
}
