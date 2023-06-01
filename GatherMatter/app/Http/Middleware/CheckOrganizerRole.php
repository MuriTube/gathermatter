<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckOrganizerRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Wenn der Benutzer nicht eingeloggt ist oder wenn der Benutzer nicht ein Admin und nicht ein Veranstalter (Organizer) ist,
        // dann wird der Benutzer auf die Indes-Seite umgeleitet.
        if (! $request->user() || ! $request->user()->isAdmin() && $request->user()->role != 'organizer') {
            return redirect('/');
        }

        // Andernfalls geht die Anfrage zur nächsten Middleware oder zum Controller.
        return $next($request);
    }
}
