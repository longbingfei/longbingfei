<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use App\Models\Administrator;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  Guard $auth
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //添加token验证
        if ($access_token = trim($request->get('access_token'))) {
            if (!$user = Administrator::where('access_token', $access_token)->first()) {
                return Response::display(['error_code' => 1010]);
            }
            if (Carbon::now() > $user->token_expr_at) {
                return Response::display(['error_code' => 1011]);
            }
            Auth::login($user);
        }
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return Response::display(['error_code' => 1012]);
            } else {
                return redirect()->guest('admin/login');
            }
        }

        return $next($request);
    }
}
