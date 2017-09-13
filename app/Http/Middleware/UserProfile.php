<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserProfile
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
        if (Auth::user()){
            // get current user id
            $user_id = Auth::user()->id;

            // get user profile
            $user_profile = \App\UserProfile::where('user_id', $user_id)->first();
            // write to seesion
            session(['user_profile'=>$user_profile]);

            return $next($request);
        }else{
            return redirect('/login');
        }

    }
}
