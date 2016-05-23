<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\InterfacesBag\User;

class AuthController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->middleware('validate',['except'=>'login']);
        $this->user = $user;
    }

    public function login(Request $request){

        $info = array_filter($request->only(['username','password']),function($x){return $x != '';});

        if(count($info) !== 2){
            return '{"Error":"Empty Username Or Password"}';
        }
        $userInfo = $this->user->validate($info);

        return $userInfo ? $userInfo : '{"Error":"Invalid AuthInfo"}';
    }

    public function logout(Request $request)
    {
        return $this->user->logout($request->get('access_token'));
    }
}
