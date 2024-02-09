<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tag;

class BuscadorPost extends Component
{
    public $buscar;
    public $tags;
    public $picked;
    public $tagSeleccionada;

    public function mount()
    {
        $this->buscar = "";
        $this->tags = [];
        $this->picked = true;
    }

    public function updatedBuscar()
    {
        $this->picked = false;

        $this->validate([
            "buscar" => "required|min:2"
        ]);

        // Convertir la entrada a minúsculas
        $busqueda = strtolower(trim($this->buscar));

        // Validación personalizada para verificar si la etiqueta existe
        $tagExists = Tag::where("slug", "like", $busqueda . "%")->exists();

        if (!$tagExists) {
            $this->addError('buscar', 'La etiqueta no existe.');
            return;
        }

        // $this->tags = Tag::where("name", "like", trim($this->buscar) . "%")
        //     ->take(15)
        //     ->get();

        $this->tags = Tag::where("slug", "like", trim($this->buscar) . "%")
            ->take(15)
            ->get();
        
    }

    public function asignarTag($nombre)
    {  
        // Convertir la etiqueta seleccionada a minúsculas
        $nombre = strtolower($nombre);

        $this->buscar = $nombre;        
        $this->picked = true;
        $this->tagSeleccionada = $nombre;

        // $tag = Tag::where("name", $nombre)->first();
    
        // if ($tag) {
        //     $this->tagSeleccionada = $tag->slug; // Almacena el slug en lugar del nombre
        //     $this->picked = true;
        // }
    }

    public function asignarPrimero()
    {
        $tag = Tag::where("slug", "like", trim(strtolower($this->buscar)) . "%")->first();

        if($tag) {
            $this->buscar = $tag->name;
        }
        else {
            $this->buscar = " ";
        }
        $this->picked = true;
    }

    public function buscarPorTag()
    {
        if ($this->tagSeleccionada) {
            // Redireccionar a la vista de posts con la etiqueta seleccionada
            return redirect()->route('posts.tag', $this->tagSeleccionada);
        }
    }
    public function render()
    {
        return view('livewire.buscador-post');
    }
}
