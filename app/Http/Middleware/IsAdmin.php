<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        // jika login sebagai admin
        if (Auth::user() && Auth::user()->roles == 'ADMIN') {
            // lanjutin ke request selanjutnya
            return $next($request);
        }

        return redirect('/');
    }
}
