<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_photo' 
    ];
    protected $appends = ['followers_count', 'following_count'];
    public function tweets()
    {
        return $this->hasMany(Tweet::class, 'user_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
   // Relación de SEGUIDORES (quienes siguen al usuario)
public function followers(): BelongsToMany
{
    return $this->belongsToMany(
        User::class,
        'follows',
        'user_followed', // ID del usuario seguido (tú)
        'user_following' // ID del seguidor
    )->withTimestamps();
}

// Relación de SEGUIDOS (a quién sigues tú)
public function following(): BelongsToMany
{
    return $this->belongsToMany(
        User::class,
        'follows',
        'user_following', // Tu ID (quien sigue)
        'user_followed' // ID del seguido
    )->withTimestamps();
}
// Asegúrate de que los contadores se carguen
public function getFollowersCountAttribute()
{
    return $this->followers()->count();
}

public function getFollowingCountAttribute()
{
    return $this->following()->count();
}


}
