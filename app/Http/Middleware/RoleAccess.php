<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleAccess
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (auth()->check() && in_array(auth()->user()->role_id, $roles)) {
            return $next($request);
        }

        abort(403, 'Akses ditolak.');
    }
}

