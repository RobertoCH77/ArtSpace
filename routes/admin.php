<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\VerifyPostController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

// Rutas para crear el CRUD categorias (genera un controlador con los 7 metodos del CRUD)
Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

// Rutas para crear el CRUD etiquetas (genera un controlador con los 7 metodos del CRUD)
Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

// Rutas para crear el CRUD posts (genera un controlador con los 7 metodos del CRUD)
Route::resource('posts', PostController::class)->except('show')->names('admin.posts');

// Rutas para crear el CRUD usuarios (genera un controlador con los 7 metodos del CRUD)
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

// Ruta personalizada para la eliminación de usuarios
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

// Ruta para eliminar posts de usuarios
Route::get('/verify-post', [VerifyPostController::class, 'index'])->middleware('can:admin.verifiPost.index')->name('admin.verifyPost.index');


// ruta de terminos y condiciones
Route::get('/terminos-y-condiciones', function () {
    return view('condiciones.terminos');
})->name('terminos.condiciones');




