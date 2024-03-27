<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if ($request->user() && $request->user()->role_id == $role) {
            return $next($request);
        }
        
        return abort(403, 'YOU HAVE NO ACCESS TO THIS ACCOUNT');
    }
}
