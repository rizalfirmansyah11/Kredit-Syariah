<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->hasRole('admin')) {
            return abort(403, 'Akses hanya untuk admin.');
        }

        return $next($request);
    }
}
