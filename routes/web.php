<?php
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;



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
Route::get('/chart', function () {
    return Inertia::render('chart');
});
Route::get('/signup', function () {
    return Inertia::render('signup');
});
Route::get('/Profile', function () {
    return Inertia::render('Profile');
});

Route::get('/dashboard1', function () {
    return Inertia::render('dashboard1');
});

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

Route::get('/transaction', function () {
    return Inertia::render('transaction');
});

Route::post('/signup', [RegisterController::class, 'store'])->name('signup.store');