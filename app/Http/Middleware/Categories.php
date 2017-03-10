<?php

namespace opStarts\Http\Middleware;

use Closure;

class Categories
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
        $data['categories'] = \opStarts\Categories::all();

        return $next($request, $data);
    }
}
