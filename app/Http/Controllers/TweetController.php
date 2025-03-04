<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'content' => 'required|string|max:280',
        ]);

        // Crear tweet
        Tweet::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return back()->with('success');
    }
}
