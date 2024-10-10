<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleHandler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         $user = Auth::user();
       
        if ($user && $user->role == 'approver') {
            return redirect('/approver');
            return $next($request);
        } else if ($user && $user->role == 'creator') {
            return redirect('/creator');
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
