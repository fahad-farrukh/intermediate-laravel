<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class MustBeSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $plan = NULL)
    {//dd(User::first());
        $user = User::first();
//        $user = $request->user();
        
        if($user && $user->subscribed($plan)){
        //if($user && $user->subscribed($plan)){
            return $next($request);
        }
        
        return redirect('/');
    }
}
