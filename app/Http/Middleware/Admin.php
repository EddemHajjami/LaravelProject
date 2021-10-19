<?php


namespace App\Http\Middleware;


use App\Models\Enums\Roles;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {

        if (Auth::user() &&  Auth::user()->role == Roles::admin) {
            return $next($request);
        }

        return redirect('/');
    }
}
