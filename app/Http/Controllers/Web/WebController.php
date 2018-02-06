<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\WebUser as WebUserModel;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class WebController extends Controller
{
    public function index()
    {
        $data = [
            'index' => true
        ];
        return view('tpl.default.index', $data);
    }

    public function need()
    {
        return view('tpl.default.need');
    }

    public function needDetail($id)
    {
        return view('tpl.default.need_detail');
    }

    public function company()
    {
        return view('tpl.default.company');
    }

    public function companyDetail($id)
    {
        return view('tpl.default.company_detail');
    }

    public function product()
    {
        return view('tpl.default.product');
    }

    public function productDetail($id)
    {
        return view('tpl.default.product_detail');
    }

    public function zone($id)
    {
        if (!session('id') || session('id') != $id) {
            return redirect('/');
        }
        return view('tpl.default.zone');
    }

    public function login(Request $request)
    {
        $info = $request->only(['username', 'password']);
        $userInfo = WebUserModel::where('username', trim($info['username']));
        if (!$userInfo->count()) {
            return ['error_code' => '用户不存在'];
        }
        $password = $userInfo->first()->password;
        if (!password_verify(trim($info['password']), $password)) {
            return ['error_code' => '密码错误'];
        }
        Auth::login($userInfo->first());
        if (!Auth::check()) {
            return ['error_code' => '登录失败'];
        }
        $currentUser = WebUserModel::where('id', Auth::id());
        $timenow = Carbon::now();
        $currentUser->update(
            [
                'last_login_time' => $currentUser->first()->login_at,
                'last_login_ip' => $currentUser->first()->login_ip,
                'login_at' => Carbon::now(),
                'login_ip' => $request->getClientIp(),
                'access_token' => str_random(40),
                'token_expr_at' => Date('Y-m-d H:i:s', strtotime($timenow) + env('ACCESS_TOKEN_EXPR'))
            ]);
        $currentUser = $currentUser->get()->toArray();
        session($currentUser[0]);
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        session()->clear();
        return redirect('/');
    }

    public function register(Request $request)
    {
        $info = $request->only(['username', 'password', 'role_ids']);
        $info['ip'] = $request->getClientIp();

        $info = array_filter($info);
        if (!isset($info['username'])) {
            return ['error_code' => '用户名为空'];
        }
        if (!isset($info['password'])) {
            return ['error_code' => '密码为空'];
        }
        if (WebUserModel::where('username', $info['username'])->count()) {

            return ['error_code' => '用户名已存在'];
        }
        $info['password'] = password_hash($info['password'], PASSWORD_BCRYPT);
        $info['creator_id'] = 1;
        $info['login_time'] = Carbon::now();
        $info['login_ip'] = $info['ip'];
        $user = WebUserModel::create($info);
        Auth::login($user);
        session($user->toArray());
        return redirect('/');
    }
}
