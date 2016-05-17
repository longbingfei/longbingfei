<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\Administrator;
use Auth;

class AdminAuthController extends Controller
{
    public $admin;
    public function __construct(Administrator $admin)
    {
        $this->admin = $admin;
    }

    public function login(Requests\AdminLoginRequest $request)
    {
        $info = $request->only(['username','password']);
        $info['ip'] = $request->getClientIp();

        return $this->admin->login($info) ? redirect('admin'): redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect('admin/login');
    }
}
