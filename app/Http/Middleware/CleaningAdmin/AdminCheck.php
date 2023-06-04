<?php

namespace App\Http\Middleware\CleaningAdmin;

use Closure;
use App\Models\Admin;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admin = Admin::firstWhere('user_id', Auth::id());

        if(empty($admin))
        {
            return redirect()->route('guest.login');
        }

        return $next($request);
    }
}
