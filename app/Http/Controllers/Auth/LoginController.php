<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(Request $request)
{
    // 1. Validation
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // 2. The "Attempt" (This does the hashing check for you!)
    if (Auth::attempt($credentials, $request->remember)) {
        // Regerate session to prevent "Session Fixation" attacks
        $request->session()->regenerate();

        return redirect()->intended('dashboard1');
    }

    // 3. If it fails, send an error back to the 'email' field
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}
}
