<?php

namespace Liulinnuha\Neon\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Closure;

class NeonAuth
{
    public function handle(Request $request, Closure $next)
    {

        if(!session()->get('neon_data')) return abort(403);

        return $next($request);
    }
}