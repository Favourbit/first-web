<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return redirect('/login')->with('error', 'Google login failed.');
        }

        // Check if the user exists by email or google_id
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // Update the google_id if it's not set yet
            $existingUser->update(['google_id' => $user->id]);
            Auth::login($existingUser);
        } else {
            // Create a new user
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'email_verified_at' => now(),
                // Password stays null
            ]);
            Auth::login($newUser);
        }

        return redirect()->intended('/dashboard1');
    }
}