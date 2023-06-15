<?php

namespace Tirtoid\Neon\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Closure;

class NeonAuth
{
    public function handle(Request $request, Closure $next)
    {

        if(!session()->get('neon_data')) return redirect()->route('google-login')->with('error', 'Please Login !');

        return $next($request);
    }
}