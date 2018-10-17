<?php

namespace App\Http\Middleware;

use Closure;

class EmailMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth("web")->check() && !auth("web")->user()->email_status) {
            return redirect('user/emailCheckShow');
        }
        return $next($request);
    }
}
