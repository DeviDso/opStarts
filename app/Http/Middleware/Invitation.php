<?php

namespace opStarts\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use opStarts\UserGroupInvitation;

class Invitation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public $attributes;

    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            $email = Auth::user()->email;

            $check = UserGroupInvitation::where('email', $email)->exists();

            if($check > 0)
            {
                $request->attributes->add(['invitation' => true]);
            }
            else
            {
                $request->attributes->add(['invitation' => false]);
            }

            return $next($request);
        }
        else
        {
            return $next($request);
        }
    }
}
