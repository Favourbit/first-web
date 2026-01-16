<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    // app/Http/Middleware/AdminMiddleware.php

public function handle(Request $request, Closure $next)
{
    if (auth()->check() && auth()->user()->role === 'admin') {
        return $next($request);
    }

    // Redirect to login or home if they aren't an admin
    return redirect('/login')->with('error', 'Admin access required.');
}
}