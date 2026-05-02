<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->check()){
            return redirect('/login');
        }

        $userRole =auth()->user()->role->slug;

        if($userRole === 'admin' || $userRole === 'moderator'){
            return $next($request);
        }

        abort(403, 'Unauthorized access.');
    }
}
