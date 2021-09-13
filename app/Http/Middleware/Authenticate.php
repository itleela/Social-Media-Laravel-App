<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    protected $guards = [];


    public function handle($request, Closure $next, ...$guards)
    {

        $this->guards = $guards;
        return parent::handle($request, $next, ...$guards);
    }


    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {


            if (in_array('admin', $this->guards)) {
                return route('admin-login-form');
            }

            return route('login-form');
        }
    }

}
