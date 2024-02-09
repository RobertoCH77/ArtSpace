<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index_categories()
    {
        $categories = Category::all();

        return view('artist_category.category', compact('categories'));
    }
}
