<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Pennant\Feature;

class ArchiveFeatureActiveMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(! Feature::active('archive')) {
            abort(404);
        }

        return $next($request);
    }
}
