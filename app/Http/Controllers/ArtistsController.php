<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ArtistsController extends Controller
{
    public function index_artitsts()
    {
        $artists = User::all();
        //$artists = User::latest('created_at')->get();

        return view('artist_category.artist', compact('artists'));
    }
}
