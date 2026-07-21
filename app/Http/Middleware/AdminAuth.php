<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }

    public static function throttleKey(Request $request): string
    {
        return $request->ip();
    }
}
