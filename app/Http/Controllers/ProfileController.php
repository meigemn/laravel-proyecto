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
        // Obtener el usuario autenticado con sus tweets y contadores
        $user = User::withCount(['tweets', 'followers', 'following'])
                ->with(['tweets' => function($query) {
                    $query->latest()->with('user'); // Cargar relación user
                }])
                ->find(Auth::id());
    
        return view('components.profile', [
            'user' => $user,
            'tweets' => $user->tweets // Solo tweets del usuario autenticado
        ]);
    }
    public function edit()
    {
        $user = Auth::user();
        return view('components.edit-profile', compact('user'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Actualizar nombre
        $user->name = $validatedData['name'];

        // Actualizar contraseña si se proporciona
        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }

        // Manejar la foto de perfil
        if ($request->hasFile('profile_photo')) {
            // Eliminar foto anterior si existe
            if ($user->user_photo) {
                Storage::disk('public')->delete($user->user_photo); // Usa el disco correcto
            }

            // Guardar nueva foto
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $user->user_photo = $path; // Guarda la ruta relativa
        }

        // Guardar cambios
        $user->save();

        return redirect()->route('profile')->with('success', 'Perfil actualizado');
    }
}
