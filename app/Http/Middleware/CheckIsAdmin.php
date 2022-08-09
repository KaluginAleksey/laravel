<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasHeader('X-UserName') &&
            $request->header('X-UserName') == 'admin' &&
            $request->hasHeader('X-password') &&
            $request->header('X-password') == hash('sha1', '123456')) {
            return $next($request);
        } else {
            abort(401, 'Unauthorized');
        }
    }
}
