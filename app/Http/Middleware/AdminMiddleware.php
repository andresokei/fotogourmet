<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Si no hay usuario autenticado, redirige al login
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        // Comprueba que el email coincida con el de .env
        if (Auth::user()->email !== config('app.admin_email', env('ADMIN_EMAIL'))) {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }

        return $next($request);
    }
}
