<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;


class Follow extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'user_following',
        'user_followed',
    ];
    /**
     * Get all of the following for the Follow
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   // Relación para obtener a quién sigue el usuario
public function following(): BelongsToMany
{
    return $this->belongsToMany(
        User::class, // Modelo relacionado
        'follows', // Tabla pivote/intermedia
        'user_following', // FK del usuario que sigue (en la tabla follows)
        'user_followed' // FK del usuario seguido (en la tabla follows)
    )->withTimestamps(); // Opcional: si tienes timestamps en la tabla follows
}

// Relación para obtener los seguidores del usuario
public function followers(): BelongsToMany
{
    return $this->belongsToMany(
        User::class,
        'follows',
        'user_followed', // Inverso de la relación anterior
        'user_following'
    )->withTimestamps();
}
}
