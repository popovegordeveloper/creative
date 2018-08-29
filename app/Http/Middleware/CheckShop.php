<?php

namespace App\Http\Middleware;

use Closure;

class CheckShop
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $shop
     * @return mixed
     */
    public function handle($request, Closure $next, $shop)
    {
        if ($shop == 'yes' && !auth()->user()->shop) return redirect('/');
        if ($shop == 'no' && auth()->user()->shop) return redirect('/');
        return $next($request);
    }
}
