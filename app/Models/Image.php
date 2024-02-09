<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // $guarded -> requiere campos que no se van a guardar en la BDD 
    // $fillable -> requiere campos que si se van a a guardar en la BDD

    protected $fillable = ['url'];
    
    // Relacion polimorfica
    public function imageable(){
        return $this->morphTo();
    }
}
