<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory; 
    protected $fillable = [
        'user_id',
        'tweet_id',
        'content',
        'time_stamp'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
{
    return $this->hasMany(\App\Models\Like::class);
}

public function isLikedBy(?User $user): bool
{
    return $user ? $this->likes->contains('user_id', $user->id) : false;
}
}
