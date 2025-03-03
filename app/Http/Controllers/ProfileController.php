<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
// ProfileController.php


public function show()
{
    $user = User::withCount(['tweets', 'followers', 'following'])
               ->findOrFail(Auth::id());

    
    return view('components.profile', ['user' => $user]);
}
public function edit()
    {
        $user = Auth::user();
        return view('components.edit-profile', compact('user'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:50',
            'password' => 'nullable|min:3|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:max_width=2000,max_height=2000',
        ]);

        // Actualizar datos básicos
        $user->name = $request->name;

        
        
        // Actualizar contraseña si se proporciona
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // Manejar la foto de perfil
        if ($request->hasFile('profile_photo')) {
            // Eliminar foto anterior si existe
            if ($user->user_photo) {
                Storage::delete('public/'.$user->user_photo);
            }
            
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $user->user_photo = $path;
        }
        /* Aunque da error el save, guarda correctamente */
        $user->save();

        return redirect()->route('profile')->with('success', 'Perfil actualizado correctamente');
    }
}
