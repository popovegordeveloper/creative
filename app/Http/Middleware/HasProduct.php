<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class HasProduct
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
        if (auth()->id() != $request->product->shop->user_id) return redirect()->back();
        return $next($request);
    }
}
