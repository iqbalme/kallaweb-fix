<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class noAccess4MainDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $domainId = [];
        $pattern = '#(?:https?:\/\/)?([a-zA-Z0-9_-]+)?.?('.config('app.url').')#i';
        preg_match($pattern, $request->fullUrl(), $domainId, PREG_UNMATCHED_AS_NULL);
        // dd(is_null($domainId[1]));
        if(is_null($domainId[1])){
            return redirect()->route('home');
        }
        return redirect()->route('kontak');
        // return $next($request);
    }
}
