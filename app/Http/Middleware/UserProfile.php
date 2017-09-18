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

            $user_profile_status = $user_profile->status;

            // get current route
            $route_tmp = explode('/', $request->url());
            $current_route = end($route_tmp);
            $management = ['department', 'staff'];

            // check user power
            if ($user_profile_status === 'inactive'){
                session()->put('alert_class', 'alert-warning');
                session()->put('alert_message', 'The account is not active, please check your email and click the confirm url.');
                return redirect()->route('alert');
            }elseif ($user_profile_status === 'active'){
                if (in_array($current_route, $management) && $user_profile->power !== 'super') {
                    session()->put('alert_class', 'alert-warning');
                    session()->put('alert_message', 'Sorry, you are not allow to access.');
                    return redirect()->route('alert');
                }
            }else{
                session()->put('alert_class', 'alert-warning');
                session()->put('alert_message', 'The account is not allow to access the system, please contact your administrator and check it.');
                return redirect()->route('alert');
            }

            // write to seesion
            session(['user_profile'=>$user_profile]);

            return $next($request);
        }else{
            return redirect('/login');
        }
    }
}
