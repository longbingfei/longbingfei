<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Repositories\InterfacesBag\Administrator;
class AdminAuthController extends Controller
{
    public $admin;
    public function __construct(Administrator $admin)
    {
        $this->admin = $admin;
        $this->middleware('auth',['except'=>['login']]);
    }

    public function index(){
        return $this->admin->index();
    }

    public function show(){
        return $this->admin->show();
    }
    public function login(Requests\AdminLoginRequest $request)
    {
        if($request->get('verifycode') != session('verifycode')){
            return Response::error(1001);
        }
        $info = $request->only(['username','password']);
        $info['ip'] = $request->getClientIp();

        return $this->admin->login($info) ? redirect()->route('home'): redirect()->back();
    }

    public function register(Requests\RegisterRequest $request)
    {
        $info = $request->only('username','password');
        $info['ip'] = $request->getClientIp();

        return $this->admin->register($info);
    }

    public function update($id,Requests\UpdateAuthRequest $request)
    {
        //此处加修改者
        $keys = [
            'name',
            'password',
            'sex',
            'email',
            'tel',
            'status',
            'avatar'
        ];
        $info = $request->all();
        $info = array_intersect_key($info,array_flip($keys));
        if($request->hasFile('file') && in_array($request->file('file')->guessExtension(),['jpg','jpeg','png','gif'])){
            $info['avatar'] = $request->file('file');
        }

        return $this->admin->update($id,$info);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('admin/auth/login');
    }
}
