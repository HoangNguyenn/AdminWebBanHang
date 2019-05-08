<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->role=1)
                return $next($request);
            else if (Auth::user()->role==0)
                return redirect('admin/layout/index');
        }
        else
            return redirect('dangnhap')->with('thongbao','Sai thông tin đăng nhập');
    }

}