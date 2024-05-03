<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    // public function handle($request, Closure $next, ...$guards)
    // {
    //     $this->authenticate($request, $guards);

    //     return $next($request);
    // }

    
    
    
     protected function redirectTo(Request $request): ?string
    {
        // dd(Auth::guard());
        // if (! $request->expectsJson()){

            
            // if (Auth::getDefaultDriver() === 'admin') {
            //     return route('admin.login');
            // }

            // if (Auth::guard('admin')->check()) {
                // return route('login');
            // }


            // return route('login');
        
        // }
        return $request->expectsJson() ? null : route('login');
    }
}
