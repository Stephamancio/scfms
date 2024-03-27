<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsParent
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
        if ($request->user() && $request->user()->role === 'parent') {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
