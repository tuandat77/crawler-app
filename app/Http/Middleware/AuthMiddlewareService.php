<?php


namespace App\Http\Middleware;


class AuthMiddlewareService
{
    public function handle($request, \Closure $next)
    {
//        return $next($request);
        if($request->session()->has('user')){
            $request->request->add(['user' => session('user')]);
            return $next($request);
        }
        return redirect('/login');
    }
}
