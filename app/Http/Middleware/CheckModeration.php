<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Closure;

class CheckModeration
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
        if (!$request->product->is_checked) return redirect('/');
        return $next($request);
    }
}
