<?php

namespace App\Http\Middleware;

use App\Models\Shop;
use Closure;

class HasShop
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
        if (auth()->id() != Shop::whereSlug($request->slug)->first()->user_id) return redirect()->back();
        return $next($request);
    }
}
