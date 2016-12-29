<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Repositories\InterfacesBag\Administrator;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    private $admin;

    public function __construct(Administrator $admin)
    {
        $this->admin = $admin;
    }

    public function handle($request, Closure $next, $permissions = null)
    {
        $permissions = $permissions ? explode('|', $permissions) : [];
        $res = $this->admin->checkPermissions(Auth::id(), $permissions);
        if (!$res) {
            return Response::display(['error_code' => 1318]);
        }

        return $next($request);
    }
}
