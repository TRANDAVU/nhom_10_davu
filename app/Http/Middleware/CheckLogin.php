<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\loainguoidung;
class CheckLogin
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
        
        
        if (Auth::check() && Auth::user()->loainguoidung_id == 1) {
            return $next($request);
        } else {
            return redirect()->route('trangchu')->with('thongbao_5','Admn hoặc những người đươc phân quyền mới được vào');
        }
    }
}
