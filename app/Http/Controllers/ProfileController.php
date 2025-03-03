<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
// ProfileController.php


public function show()
{
    $user = User::where('id', Auth::id())
        ->withCount(['tweets', 'followers', 'following'])
        ->first();

    return view('components.profile', ['user' => $user]);
}
}
