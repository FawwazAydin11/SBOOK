<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedByRole
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            return match (Auth::user()->role) {
                'pemilik' => redirect()->route('pemilik.dashboard'),
                'pelanggan' => redirect()->route('pelanggan.dashboard'),
                default => redirect('/'),
            };
        }

        return $next($request);
    }
}

