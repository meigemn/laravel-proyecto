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
    //Modificar tweet
    public function update(Request $request, Tweet $tweet)
    {
        $this->authorize('update', $tweet);
        
        $request->validate(['content' => 'required|max:280']);
        
        $tweet->update(['content' => $request->content]);
        
        return redirect()->back()->with('success', 'Tweet actualizado');
    }
    //borrar tweet
    public function destroy(Tweet $tweet)
    {
        $this->authorize('delete', $tweet);
        
        $tweet->delete();
        
        return redirect()->back()->with('success', 'Tweet eliminado');
    }
}
