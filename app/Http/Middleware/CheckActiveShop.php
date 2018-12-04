<?php

namespace App\Http\Middleware;

use App\Models\Shop;
use Closure;

class CheckActiveShop
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
        $shop = Shop::whereSlug($request->slug)->first();
        if (!$shop->is_user_active && (!auth()->id() || (auth()->id() != $shop->user_id))) return redirect('/');
        return $next($request);
    }
}
