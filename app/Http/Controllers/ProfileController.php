<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ProfileController extends Controller
{
    public function show()
    {
        
        // Fetch the currently authenticated user
        $trabajador = Auth::user();
        return view('profile.show', compact('trabajador'));
        
        /*
        // Replace 1 with the desired user ID
        $trabajador = User::find(16);
        return view('profile.show', compact('trabajador'));
        */
    }
}
