<?php

namespace opStarts\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Unconfirmed
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
        if(Auth::user()->status == 0)
        {
            return $next($request);
        }
        
        return redirect('');
    }
}