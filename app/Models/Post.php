<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // asignacion masiva para guardar en la base de datos.
    // $guarded -> requiere campos que no se van a guardar en la BDD, ejemplo: 'id', 'created_at', 'updated_at' 
    // $fillable -> requiere campos que si se vana a guardar en la BDD
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relacion uno a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // Relacion muchos a muchos
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    // Relacion uno a uno - polimorfica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

     // Relación de likes
    // public function likes()
    // {
    //     return $this->hasMany(Like::class);
    // }

    // public function likedBy(User $user)
    // {
    //     return $this->likes()->where('user_id', $user->id)->exists();
    // }

    // Relación de likes
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id')->withTimestamps();
    }

    // Verificar si el post es liked por un usuario específico
    public function likedBy(?User $user)
    {
        return $user && $this->likes->contains('id', $user->id);
    }

    // Dar like a un post
    public function like(User $user)
    {
        if (!$this->likedBy($user)) {
            $this->likes()->attach($user);
            $this->increment('likes_count'); // Incrementa la cuenta de likes
        }
    }

    // Quitar like a un post
    public function unlike(User $user)
    {
        if ($this->likedBy($user)) {
            $this->likes()->detach($user);
            $this->decrement('likes_count'); // Decrementa la cuenta de likes
        }
    }
}
