<?php

namespace App\Http\Middleware;

use Closure;

/*
 * Author: Le Cong Thang
 */

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $val = $request->header('x-auth-key');
        $key = config('app.auth_key');

        if($val === $key) {
            return $next($request);
        } else {
            abort(403, 'Access Denied');
        }
    }
}
