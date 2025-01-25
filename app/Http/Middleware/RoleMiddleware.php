<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        \Log::info('Middleware role check:', [
            'expected_role' => $role,
            'actual_role' => Auth::user() ? Auth::user()->role : 'Guest',
            'authenticated' => Auth::check()
        ]);
    
        // Periksa jika role user cocok dengan role yang diharapkan
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }
    
        // Jika role tidak cocok, log error dan return 403
        \Log::error('Unauthorized access attempt:', [
            'user_id' => Auth::user() ? Auth::user()->id : null,
            'role' => Auth::user() ? Auth::user()->role : 'Guest'
        ]);
    
        return abort(403, 'User does not have the right roles.');
    }
    
}
