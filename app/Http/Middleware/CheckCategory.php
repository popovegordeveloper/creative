<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;

class CheckCategory
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
        if (!$request->get('sale')) {
            if (!$request->slug_category) return redirect('/');
            if (!Category::whereSlug($request->slug_category)->first()->is_active) return redirect('/');
        }

        return $next($request);
    }
}
