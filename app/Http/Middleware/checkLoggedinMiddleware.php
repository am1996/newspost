<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkLoggedinMiddleware
{
    private $disallowIfLoggedin = [
        "login",
        "register",
    ];
    private $authNeeded = [
        "user",
        "posts/add"
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $url = $request->path();
        if(in_array($url,$this->disallowIfLoggedin) && Auth::check())
            return abort(403);
        else if(in_array($url,$this->authNeeded) && !Auth::check())
            return abort(403);
        else return $next($request);
    }
}
