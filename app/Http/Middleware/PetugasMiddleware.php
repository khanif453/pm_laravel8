<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PetugasMiddleware
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
        if (Auth::guard('petugas')->check()) {
            if (Auth::guard('petugas')->user()->status == 1){
                if(Auth::guard('petugas')->user()->level == 'Petugas'){
                    return $next($request);
                }
            }
        }
        
        return redirect('/admin/dashboard');
    }
}
