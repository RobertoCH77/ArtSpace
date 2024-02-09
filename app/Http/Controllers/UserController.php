<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function showPosts(User $user)
    {
        $posts = $user->posts()->latest('id')->paginate(20); 

        return view('artist.posts', compact('user', 'posts'));
    }
}
