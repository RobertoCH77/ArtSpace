<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagController;

use App\Http\Controllers\SearchController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [PostController::class, 'index'])->name('posts.index');

// ruta del buscador de etiquetas
Route::get('posts/tags/{tag}', [PostController::class, 'tags'])->name('posts.tags');
Route::get('posts/category/{category}', [PostController::class, 'category'])->name('posts.categorySearch');

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');

Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');

// rutas del navegador (artistas-categorias)
Route::get('artists', [ArtistsController::class, 'index_artitsts'])->name('artist_category.artist');
Route::get('categories', [CategoriesController::class, 'index_categories'])->name('artist_category.category');
Route::get('search/tags', [TagController::class, 'index_tags'])->name('artist_category.tag'); // ruta del buscador de etiquetas

// visualizar posts asociados a un usuario
Route::get('/user/{user}/posts', [UserController::class, 'showPosts'])->name('artist.posts');

// ruta de acerca de
Route::get('/acerca-de', function () {
    return view('acerca.acercaDe');
})->name('acerca.acercaDe');

// ruta de formualrio de contacto
Route::get('/form-contacto', function () {
    return view('formularios.form-contacto');
})->name('formularios.form-contacto');

// ruta de formualrio de blogger
Route::get('/form-blogger', function () {
    return view('formularios.form-blogger');
})->name('formularios.form-blogger');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


