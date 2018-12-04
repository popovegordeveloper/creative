<?php

namespace App\Http\Middleware;

use Closure;

class CheckActiveProduct
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
        if (!$request->product->is_active) return redirect('/');
        return $next($request);
    }
}
