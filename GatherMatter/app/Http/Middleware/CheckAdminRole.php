<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        // Ueberprueft ob user Admin ist
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }

        // Wenn der Benutzer keine Admin-Rolle hat, leiten Sie ihn zur Startseite um.
        return redirect('/');
    }
}
