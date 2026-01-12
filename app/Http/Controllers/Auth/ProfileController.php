<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SystemMessage;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        // 1. Validation
        $request->validate([
            'fullname' => 'required|string|max:55',
            // Unique email check, but ignores the current user's ID
            'email' => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
            'password' => 'nullable|confirmed|min:8',
            'user_profile' => 'nullable|image|max:10240', // Max 2MB
        ]);

        // 2. Update Text Fields
        $user->fullname = $request->fullname;
        $user->email = $request->email;

        // 3. Handle Password (Only if typed)
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        // IMPORTANT: Only update password if the user actually typed a new one
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

        // 4. Handle Profile Picture (Binary BLOB)
        if ($request->hasFile('user_profile')) {
            $file = $request->file('user_profile');
            // Read the file content as binary for your BLOB column
            $user->user_profile = file_get_contents($file->getRealPath());
        }

        $user->save();
        $user->notify(new SystemMessage('Profile Updated', 'Your changes have been saved.'));

        return back();
    }
}
