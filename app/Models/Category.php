<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Para poder almacenar los registros en la base de datos usamos la asignacion masiva
    protected $fillable = ['name', 'slug'];

    // Laravel ya no toma el id para mostrar la infomacion de una determinada categoria en la url
    public function getRouteKeyName(){
        return 'slug';
    }

    // Relacion uno a muchos
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
