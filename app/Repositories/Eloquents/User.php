<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/23
 * Time: 上午11:47
 */
namespace App\Repositories\Eloquents;

use App\Models\User as UserModel;
use App\Models\AccessToken;
use App\Repositories\InterfacesBag\User as UserInterface;
class User implements UserInterface{
    //登录时返回token
    //登出时销毁token
    public function validate(array $info){
        $verify = false;
        $userInfo = UserModel::where('username',$info['username'])->first();
        if($userInfo && password_verify($info['password'],$userInfo->password)){
            $AccessToken = $this->makeToken($userInfo->id);
            AccessToken::create(['token'=>$AccessToken,'user_id'=>$userInfo->id]);
            $userInfo = $userInfo->toArray();
            $userInfo['AccessToken'] = $AccessToken;
            $verify = true;
        }

        return $verify ? $userInfo : false;
    }

    public function logout($token){
        return $this->verifyToken($token) ? $this->destroyToken($token) : false;
    }

    private function makeToken($id){
        $header = [
            "typ"=>"JWT",
            "alg"=>"H256",
        ];
        $payload = [
            "iat"=>time(),
            "exp"=>time()+3600,
        ];

        $header = base64_encode(json_encode($header));
        $payload = base64_encode(json_encode($payload));
        $signature = HASH_HMAC('sha256',$header.'.'.$payload,env('JWT_SECRET'));

        return $header.'.'.$payload.'.'.$signature;
    }

    public function verifyToken($access_token){
        $auth = false;
        $token = explode('.',trim($access_token));
        if(HASH_HMAC('sha256',$token[0].'.'.$token[1],env('JWT_SECRET')) !== $token[2]){ //验证secret
            return false;
        }

        if(!is_null($at = AccessToken::where('token',$access_token)->first())){ //token若不存在,则验证失败
            $payload = json_decode(base64_decode($token[1]),1);

            date_default_timezone_set('PRC');
            if(time() > $payload['exp']){ //验证token是否过期,是则删除.
                $this->destroyToken($access_token);
            }else{
                $auth = ['user_id'=>$at->user_id];
            }
        }

        return $auth;
    }

    private function destroyToken($token){
        return AccessToken::where('token',$token)->delete();
    }
}