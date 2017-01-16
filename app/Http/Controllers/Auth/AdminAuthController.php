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
        $this->middleware('permission:user-op', ['except' => ['login', 'logout']]);
        $this->middleware('permission:user-list', ['only' => 'index']);
    }

    public function index(Request $request)
    {
        $fillable = [
            'per_page_num',
            'page',
        ];
        $resp = $this->admin->index($request->only($fillable));

        return view('admin.auth', ['users' => $resp]);
    }

    public function show()
    {
        return $this->admin->show();
    }

    public function login(Request $request)
    {
        if (strtoupper($request->get('verifycode')) != strtoupper(session('verifycode'))) {
            $return = ['error_code' => 1001];
        } else {
            $info = $request->only(['username', 'password']);
            $info['ip'] = $request->getClientIp();
            $return = $this->admin->login($info);
        }

        return $return === true ? redirect('admin') : back()->withErrors([config('error.' . current($return))]);
    }

    public function register(Request $request)
    {
        $info = $request->only(['username', 'password', 'role_ids']);
        $info['ip'] = $request->getClientIp();

        $resp = $this->admin->register($info);

        return Response::display($resp);
    }

    public function roles()
    {
        return $this->admin->getAllRoles();
    }

    public function permissions()
    {
        return $this->admin->getAllPermissions();
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
            return Response::display(['error_code' => 1009]);
        }
        if ($error_code = call_user_func(app('ValidatorForm'), $request, $rules)) {
            return Response::display(['error_code' => $error_code]);
        }
        $return = $this->admin->update($id, $request->only($fillable));

        return Response::display($return);
    }

    public function AttachRoles(Request $request, $user_id)
    {
        $resp = $this->admin->attachRolesToUser($user_id, $request->get('role_ids'));

        return Response::display($resp);
    }

    public function AttachPermissions(Request $request, $role_id)
    {
        $resp = $this->admin->attachPermissionsToRole($role_id, $request->get('permission_ids'));

        return Response::display($resp);
    }

    public function delete($id)
    {
        $resp = $this->admin->delete($id);

        return Response::display($resp);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('admin');
    }
}
