<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    // Dar like
    public function store(Tweet $tweet)
    {
        // Verificar si el usuario ya dio like
        if(!$tweet->isLikedBy(Auth::user())) {
            $tweet->likes()->create([
                'user_id' => Auth::id()
            ]);
        }

        return back();
    }

    // Quitar like
    public function destroy(Tweet $tweet)
    {
        $tweet->likes()->where('user_id', Auth::id())->delete();
        return back();
    }
}