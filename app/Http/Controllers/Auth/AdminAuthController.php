<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use App\Repositories\InterfacesBag\Administrator;

class AdminAuthController extends Controller
{
    public $admin;

    public function __construct(Administrator $admin)
    {
        $this->admin = $admin;
        $this->middleware('auth', ['except' => ['login']]);
    }

    public function index()
    {
        return $this->admin->index();
    }

    public function show()
    {
        return $this->admin->show();
    }

    public function login(Request $request)
    {
        if ($request->get('verifycode') != session('verifycode')) {
            return Response::display(['errorCode' => 1001]);
        }
        $info = $request->only(['username', 'password']);
        $info['ip'] = $request->getClientIp();
        $return = $this->admin->login($info);

        return $return === true ? redirect('admin/feature/style') : view('admin.login', $return);
    }

    public function register(Request $request)
    {
        $info = $request->only('username', 'password');
        $info['ip'] = $request->getClientIp();

        return $this->admin->register($info);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name.min:2'     => 1002,
            'password.min:6' => 1006,
            'email.email'    => 1007,
            'file.image'     => 1104
        ];
        $fillable = [
            'name',
            'password',
            'sex',
            'email',
            'tel',
            'status',
            'file'
        ];
        if (empty(array_filter($request->only($fillable)))) {
            return Response::display(['errorCode' => 1009]);
        }
        if ($errorCode = call_user_func(app('ValidatorForm'), $request, $rules)) {
            return Response::display(['errorCode' => $errorCode]);
        }
        $return = $this->admin->update($id, $request->only($fillable));

        return Response::display($return);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('admin/auth/login');
    }
}
