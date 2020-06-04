<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class ContentMiddleware
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
        if (Auth::user()->loainguoidung_id == 6 || Auth::user()->loainguoidung_id == 2) {
            return $next($request);
        } else {
            return redirect()->route('trangchu')->with('thongbao_5','Admin hoặc những người đươc phân quyền mới được vào');
        }
    }
}
