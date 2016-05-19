<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\InterfacesBag\Administrator;
use Auth;
use Illuminate\Http\Request;

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
    public function login(Requests\AdminLoginRequest $request)
    {
        $info = $request->only(['username','password']);
        $info['ip'] = $request->getClientIp();

        return $this->admin->login($info) ? redirect('admin/auth'): redirect()->back();
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
//            'username',
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

        return $this->admin->update($id,$info);
    }

    public function avatar(Request $request){
        if(!$request->hasFile('avatar')){
            die(0);
        }else{
            $file = $request->file('avatar');
            $types = ['jpg','png','gif'];
            $type = $file['type'];
            if(!in_array($file['type'],$types)){
                die(1);
            }
            if($file['size']>2*1024){
                die(2);
            }
            $name = 'avatar-'.Auth::id().'.'.$type;
            @unlink(public_path('avatar').'/'.$name);
            if(move_uploaded_file($name,public_path('avatar'))){
                $request->offsetSet('avatar', public_path('avatar').'/'.$name);

                return !$this->update(Auth::id(),$request) ? 3 : 4;
            }
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('admin/auth/login');
    }
}
