<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard('petugas')->check()) {
            if (Auth::guard('petugas')->user()->status == 1){
                if(Auth::guard('petugas')->user()->level == 'Admin'){
                    return redirect('/admin/dashboard');
                }
            }
        }

        if (Auth::guard('petugas')->check()) {
            if (Auth::guard('petugas')->user()->status == 1){
                if(Auth::guard('petugas')->user()->level == 'Petugas'){
                    return redirect('/petugas/dashboard');
                }
            }
        }
        
        if (Auth::guard('masyarakat')->check()) {
            return redirect('/masyarakat/dashboard');
        }

        return $next($request);
    }
}
