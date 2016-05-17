<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/16
 * Time: 下午4:05
 */
namespace App\Repositories\Eloquents;
use Auth;
use App\Models\Administrator as AdminModel;
use App\Repositories\InterfacesBag\Administrator as AdminInterface;
use Carbon\Carbon;

class Administrator implements AdminInterface{
    public function login(array $info)
    {
        $verify = false;
        $userInfo = AdminModel::where('username',trim($info['username']));
        if($userInfo->count()) {
            $password = $userInfo->first()->password;
            if (password_verify(trim($info['password']), $password)) {
                Auth::login($userInfo->first());
                AdminModel::where('id',Auth::User()->id)->update(['last_login_time'=>Carbon::now(),
                    'last_login_ip'=>$info['ip']]);
                $verify = true;
            }
        }

        return $verify;
    }
    public function register(){}
    public function update(){}
}