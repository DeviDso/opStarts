<?php

namespace opStarts\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class maxPages
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
        if(Auth::user()->pages()->count() >=  3)
        {
            return redirect()->back()->with('message', 'Maximum 3 pages per profile!');
        }
        else
        {
            return $next($request);
        }
    }
}
