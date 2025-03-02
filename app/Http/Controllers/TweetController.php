<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TweetController extends Controller
{
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'content' => 'required|string|max:280',
        ]);

        // Crear tweet
        Auth::user()->tweets->create([
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Tweet publicado!');
    }
}