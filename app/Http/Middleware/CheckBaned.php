<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request; // Importa la clase Request

class CheckBaned
{
    public function handle(Request $request, Closure $next)
    {
        // El middleware 'auth' ya validó al usuario
        if ($request->user()->is_baned) { // ✅ Sin verificar si existe
            return redirect()->route('baned-page');
        }

        return $next($request);
    }
}