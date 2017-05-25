<?php

namespace App\Http\Middleware;

use Closure;

class FakeAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->has('user')) {
            $fake_user = [
                'id' => '2013',
                'username' => 'user',
                'nickname' => 'doger',
                'sex' => 'm',
                'email' => 'user@scut.com',
                'phone' => '1230000',
                'address' => 'C10',
            ];
            session(['user' => $fake_user]);
        }

        return $next($request);
    }
}