<?php


namespace App\Http\Middleware;


use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class UnAuthenticAdmin
{
    public function handle($request, Closure $next)
    {
        if (!empty(Auth::user()) && Auth::user()->user_type === User::ADMIN) {
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}
