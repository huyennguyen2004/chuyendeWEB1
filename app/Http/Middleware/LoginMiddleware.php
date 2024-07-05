<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('site.getlogin')->with('message', 'Bạn cần đăng nhập để tiếp tục.');
        }

        $user = Auth::user();

        if ($user->roles !== "admin") {
            return redirect()->route('site.home')->with('message', 'Bạn không có quyền truy cập vào trang này.');
        }

        return $next($request);
    }
}
