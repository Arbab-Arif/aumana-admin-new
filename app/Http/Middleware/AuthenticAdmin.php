<?php


namespace App\Http\Middleware;


use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticAdmin
{
    public function handle($request, Closure $next)
    {
        if (empty(Auth::user()) || (!empty(Auth::user()) && Auth::user()->user_type !== User::ADMIN)) {
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}
