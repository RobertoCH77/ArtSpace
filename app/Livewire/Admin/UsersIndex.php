<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use App\Models\User;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = 'bootstrap';

    // para que cuando se este buscando se resetee la ruta
    public function updatingSearch() {
        $this->resetPage();
    }
    public function render()
    {
        // recuperamos el listado de usuarios
        $users = User::where('name','LIKE', '%' . $this->search . '%')
                        ->orWhere('email','LIKE', '%' . $this->search . '%')
                        ->paginate();
        return view('livewire.admin.users-index', compact('users'));
    }
}
