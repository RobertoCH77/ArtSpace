<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

use App\File;
use Spatie\Dropbox\Client;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.posts.edit')->only('edit','update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');

        //$this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
    }
    
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        // recuperamos la coleccion de categorias
        $categories = Category::pluck('name', 'id'); // pluck: genera un array pero solo del campo "name"

        // recuperamos la coleccion de etiquetas
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(PostRequest $request)
    {
        // creacion de un nuevo post
        $post = Post::create($request->all());

        // subir una imagen no es obligatorio por eso la condicional
        if($request->file('file')){
            //$url = Storage::put('posts', $request->file('file'));

            //$u$url = Storage::disk('dropbox')->put('posts', $request->file('file'));
            $url = Storage::disk('public')->put('posts', $request->file('file'));

            // accedo a a la relacion polimorfica
            $post->image()->create([
                'url' => $url
            ]);
        }

        // guarda en tabla intermedia "post_tag"
        if ($request->tags){
            $post->tags()->attach($request->tags);         
        }

        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se ha creado con éxito.');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        // regla de autorizacion
        $this->authorize('author', $post);

        // recuepramos la coleccion de categorias
        $categories = Category::pluck('name', 'id'); // pluck: genera un array pero solo del campo "name"

        // recuperamos la coleccion de etiquetas
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        // regla de autorizacion
        $this->authorize('author', $post);

        $post->update($request->all());

        if($request->file('file')){
            //$url = Storage::put('posts', $request->file('file'));
            $url = Storage::disk('public')->put('posts', $request->file('file'));

            // Elimina la imagen anterior si existe
            if($post->image){
                Storage::disk('public')->delete($post->image->url);
            
                $post->image->update([
                    'url' => $url
                ]);
            } else {
                // Crea un nueva image y lo asocia al post
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }

        // guarda en tabla intermedia "post_tag"
        if ($request->tags){
            $post->tags()->sync($request->tags);         
        }

        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se actualizó con exitó.');
    }
    public function destroy(Post $post)
    {
        // regla de autorizacion
        $this->authorize('author', $post);
        
        $post->delete();

        return redirect()->route('admin.posts.index', $post)->with('info', 'El post se eliminó con exitó.');
    }
}
