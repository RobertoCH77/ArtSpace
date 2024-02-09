<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // Para poder almacenar los registros en la base de datos usamos la asignacion masiva
    // $guarded -> requiere campos que no se van a guardar en la BDD 
    // $fillable -> requiere campos que si se vana a guardar en la BDD
    protected $fillable = ['name', 'slug', 'color'];

    // laravel ya no toma el id para mostrar la infomacion de una determinada categoria
    public function getRouteKeyName(){
        return 'slug';
    }

     // Relacion muchos a muchos
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
