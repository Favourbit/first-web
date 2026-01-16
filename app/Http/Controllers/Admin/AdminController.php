<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request; // Added this to handle search input
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // 1. Get the search term from the URL (e.g., ?search=glory)
        $search = $request->input('search');

        return Inertia::render('Admin/Dashboard', [
            // 2. Pass the search term back to the frontend to keep the input filled
            'filters' => $request->only(['search']),

            'stats' => [
                'totalUsers' => User::where('role', 'user')->count(),
                'totalTransactions' => Transaction::count(),
                'totalVolume' => Transaction::sum('amount') ?? 0,
            ],

            // 3. Updated User query with Search functionality
            'users' => User::where('role', 'user')
                ->when($search, function ($query, $search) {
                    $query->where(function ($q) use ($search) {
                        $q->where('fullname', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    });
                })
                ->latest()
                ->get() // No semicolon here!
                ->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'fullname' => $user->fullname,
                        'email' => $user->email,
                        'role' => $user->role,
                        'created_at' => $user->created_at,
                    ];
                }), // This comma belongs to the Inertia array

            'recentTransactions' => Transaction::with('user')->latest()->take(10)->get(),
        ]);
    }

    // 4. New method to handle the Broadcast/Notification form
    public function notify(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500'
        ]);

        // Logic for notifications would go here (e.g., Mail or Database Notification)
        // For now, we'll just return a success message
        return back()->with('success', 'Global notification has been broadcasted!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Safety check: Don't delete yourself
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete yourself.');
        }

        $user->delete();
        return back()->with('success', 'User and associated records deleted.');
    }
}