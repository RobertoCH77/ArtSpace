<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')->only('like');
    // }

    public function index(){
        $posts = Post::where('status', 2)
            ->latest('id')
            ->paginate(30); // paginate(50): numero de posts que se visualiza 

        return view('posts.index', compact('posts'));
    }
    //metodo del buscador
    public function tags (Request $request){
        // $term = $request->get('term');

        // $querys = Tag::where('name', 'LIKE', '%' . $term . '%')->get();

        // $data = [];

        // foreach ($querys as $query) {
        //     $data[] = [
        //         'value' => $query->name,
        //         'label' => $query->name
        //     ];
        // }

        // return response()->json($data);

        $term = $request->get('term');

        // Buscar posts relacionados con la etiqueta
        $posts = Post::whereHas('tags', function($query) use ($term) {
            $query->where('name', 'LIKE', '%' . $term . '%');
        })->where('status', 2)->latest('id')->get();

        $data = [];

        foreach ($posts as $post) {
            $data[] = [
                'value' => $post->name,  // Cambia a un campo relevante de tu modelo Post
                'label' => $post->name,  // Cambia a un campo relevante de tu modelo Post
                'url' => route('posts.show', $post)  // Agrega la URL del post
            ];
        }

        return response()->json($data);

    }

    // detalle del post
    public function show(Post $post){

        // regla de autorizacion
        $this->authorize('published', $post);

        //recuperamos todos los registros similares a este post
        $similares = Post::where('category_id', $post->category_id)
                            ->where('status', 2) // filtro (publicado)
                            ->where('id', '!=', $post->id) // recuepra todos los post sea distintos al post
                            ->latest('id') // ordena de manera descendente
                            ->take(4) // trae cuatro registros
                            ->get();

        return view('posts.show', compact('post', 'similares'));
    }

    // metodo para mostrar todos los posts publicados de un artista
    public function showUserPosts(User $user) {
        // Obtener solo los posts publicados del usuario
        $posts = $user->posts()
            ->where('status', 2) // Filtro para posts publicados
            ->latest()
            ->paginate(20); 

        // Obtener las etiquetas solo si hay posts publicados
        $allTags = $posts->count() > 0 ? Tag::whereIn('id', $posts->pluck('id'))->get() : collect();

        return view('posts.show', compact('user', 'posts', 'allTags'));
    }
    

    public function category(Category $category){

        // recuperamos el listado de post
        $posts = Post::where('category_id', $category->id)
                            ->where('status', 2)  // publicados
                            ->latest('id') 
                            ->paginate(10); // pagine en seis en seis

        return view('posts.category', compact('posts', 'category'));
    }

    public function tag(Tag $tag){

        $posts = $tag->posts()->where('status', 2) // posts publicados
                                ->latest('id') // ordena de manera descendente
                                ->paginate(30); 

        return view('posts.tag', compact('posts', 'tag'));
    }

    // metodo de megustas
    // public function like(Post $post)
    // {
    //     $user = auth()->user();

    //     // Verifica si el usuario ya ha dado like al post
    //     if ($post->likes()->where('user_id', $user->id)->exists()) {
    //         // Elimina el like
    //         $post->likes()->where('user_id', $user->id)->delete();
    //         // Decrementa la cuenta de likes en el post
    //         $post->decrement('likes_count');
    //     } else {
    //         // Agrega el like
    //         $post->likes()->create(['user_id' => $user->id]);
    //         // Incrementa la cuenta de likes en el post
    //         $post->increment('likes_count');
    //     }

    //     return back(); // Redirecciona de vuelta al post después de dar/quitar like
    // }

}
