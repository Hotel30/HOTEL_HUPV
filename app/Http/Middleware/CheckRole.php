<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (Auth::check() && in_array(Auth::user()->rol, $roles)) {
            return $next($request);
        }

        return redirect()->route('index')->with('error', 'No tienes permiso para acceder a esta página.');
    }
}

