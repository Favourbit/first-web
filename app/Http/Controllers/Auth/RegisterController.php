<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        // 1. THE CHECKPOINT (Validation)
        // We stop the process here if the data is wrong.
        $request->validate([
            'fullname' => 'required|string|max:55',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 2. THE TRANSFORMATION (Creation & Hashing)
        // We take the "Raw" data and turn it into a Database Record.
        $user = User::create([
            'fullname' => $request->fullname,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // This creates that 255-char hash
        ]);

        // 3. THE WELCOME (Auto-Login)
        // In modern apps, you don't make them log in again immediately.
        Auth::login($user);

        // 4. THE REDIRECT (Inertia Response)
        // We tell the frontend: "Success! Move the user to the dashboard."
        return redirect('/dashboard1');
    }
}
