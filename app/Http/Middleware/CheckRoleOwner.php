<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckRoleOwner
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

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->KODE_JABATAN == 1) {
            return $next ($request);
        } 
        else if (Auth::user()->KODE_JABATAN == 2) {
            return redirect()->route('admin-gudang');
        }
        else if(Auth::user()->KODE_JABATAN == 3){
            return redirect()->route('manajer-marketing');
        }
        else if (Auth::user()->KODE_JABATAN == 4) {
            return redirect()->route('sales-a');
        }
        else if (Auth::user()->KODE_JABATAN == 5) {
            return redirect()->route('sales-b');
        }
        else if (Auth::user()->KODE_JABATAN == 6) {
            return redirect()->route('operator-mesin');
        }
        
    }
}
