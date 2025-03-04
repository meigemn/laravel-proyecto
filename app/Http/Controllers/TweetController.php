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
        try {
            $this->authorize('delete', $tweet);
            
            $tweet->delete();
    
            return response()->json([
                'success' => true,
                'message' => 'Tweet eliminado correctamente'
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el tweet: ' . $e->getMessage()
            ], 500);
        }
    }
}
