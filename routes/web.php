<?php
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\GoogleController;
use Illuminate\Http\Request; // Use this instead // Remove this if it's at the top
use App\Http\Controllers\TransactionController;

// Ensure this is inside your auth middleware group

// Replace the old Route::get('/transaction'...) with this:
Route::get('/transaction', [TransactionController::class, 'showAll'])
    ->middleware(['auth'])
    ->name('transactions.index');


Route::middleware(['auth'])->group(function () {
    // This handles showing the dashboard
    Route::get('/dashboard1', [TransactionController::class, 'index'])->name('dashboard1');
    Route::get('/chart', [TransactionController::class, 'chart'])->name('chart');

    Route::post('/notifications/read', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return back();
    })->name('notifications.markRead');

    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
});
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.signup');

// Route::get('/dashboard1', function () {
//     return Inertia::render('dashboard1'); // Match the .vue filename!
// })->middleware(['auth'])->name('dashboard');

// // routes/web.php
// Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
//     ->name('logout');

Route::post('/notifications/mark-as-read', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return back();
})->middleware('auth');

Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::post('/notifications/mark-as-read', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return back();
})->middleware('auth');

// 1. This shows the page
Route::get('/profile', function () {
    return inertia('Profile'); 
})->name('profile');

// 2. This handles the "Save Changes" button (THE MISSING PIECE)
Route::post('/profile-update', [ProfileController::class, 'update'])->name('profile.update');

// Route::get('/', function () {
// return Inertia::render('Welcome', [
//     'canRegister' => Features::enabled(Features::registration()),
// ]);
// })->name('home');

// Route::get('dashboard', function () {
// return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// require __DIR__ . '/settings.php';

Route::get('/', function () {
    return Inertia::render('home');
});
// Route::get('/chart', function () {
//     return Inertia::render('chart');
// });
Route::get('/signup', function () {
    return Inertia::render('signup');
});
Route::get('/Profile', function () {
    return Inertia::render('Profile');
});

// Route::get('/dashboard1', function () {
//     return Inertia::render('dashboard1'); // This name must match the filename exactly
// });

Route::get('/forgotPassword', function () {
    return Inertia::render('forgotPassword');
});

Route::get('/about-us', function () {
    return Inertia::render('about-us');
});
Route::get('/login', function () {
    return Inertia::render('login');
});

Route::get('/FAQs', function () {
    return Inertia::render('FAQs');
});

// Route::get('/transaction', function () {
//     return Inertia::render('transaction');
// });

Route::post('/signup', [RegisterController::class, 'store'])->name('signup.store');