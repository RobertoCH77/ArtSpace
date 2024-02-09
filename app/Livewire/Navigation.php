<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\User;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        //$users = User::all();
        //return view('livewire.navigation', compact('users'));

        $categories = Category::all();

        return view('livewire.navigation', compact('categories'));
    }
}
