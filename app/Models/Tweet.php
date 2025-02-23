<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tweet extends Model
{
    protected $fillable = [
        'user_id',
        'tweet_id',
        'contain',
        'time_stamp'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
