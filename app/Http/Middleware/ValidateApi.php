<?php

namespace App\Http\Middleware;

use Closure;
use App\Repositories\Eloquents\User;
class ValidateApi
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($authorization = $request->header('Authorization')){//验证头
            $authorization = trim(ltrim($authorization,'Bearer'));//验证signature
            if($auth = (new User())->verifyToken($authorization)){
                $request->offsetSet('userInfo',$auth);

                return $next($request);
            }
            return '{"Error":"Invalid Token","Code":"403"}';
        }

        return '{"Error":"Authorize Failed","Code":"401"}';
    }
}
