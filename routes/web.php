<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canRegister' => Features::enabled(Features::registration()),
//     ]);
// })->name('home');

// Route::get('dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// require __DIR__.'/settings.php';

Route::get('/', function () {
    return Inertia::render('home');
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