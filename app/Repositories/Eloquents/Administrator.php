<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/16
 * Time: 下午4:05
 */
namespace App\Repositories\Eloquents;
use Auth;
use Carbon\Carbon;
use App\Models\Administrator as AdminModel;
use App\Repositories\Eloquents\Media as MediaEloquent;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Repositories\InterfacesBag\Administrator as AdminInterface;

class Administrator implements AdminInterface{
    protected $module = 'auth';
    public function index(){
        return AdminModel::all();
    }
    public function login(array $info){
        $verify = false;
        $userInfo = AdminModel::where('username',trim($info['username']));
        if($userInfo->count()) {
            $password = $userInfo->first()->password;
            if (password_verify(trim($info['password']), $password)) {
                Auth::login($userInfo->first());
                $currentUser = AdminModel::where('administrators.id',Auth::User()->id);
                $currentUser->update(['last_login_time'=>Carbon::now(),
                    'last_login_ip'=>$info['ip']]);
                $path = $currentUser->leftJoin('medias','administrators.avatar','=','medias.id')->select('administrators.*','medias.path')->first()->path;
                session(['avatar'=>$path]);
                $verify = true;
                event('log',[[$this->module,'l',Auth::User()->toArray()]]);
            }
        }

        return $verify;
    }
    public function register(array $info){
        if(AdminModel::where('username',$info['username'])->count()){
            event('log',[[$this->module,'r','username has already exists',0]]);

            return 0;
        }
        $info['password'] = password_hash($info['password'],PASSWORD_BCRYPT);
        $info['creator_id'] = Auth::id();
        $info['last_login_time'] = Carbon::now();
        $info['last_login_ip'] = $info['ip'];

        if($user = AdminModel::create($info)){
            event('log',[[$this->module,'r',$user->toArray()]]);

            return 1;
        }
    }
    public function update($id,array $info){
        $before = AdminModel::findOrFail($id);
        if(isset($info['avatar']) && $info['avatar'] instanceof UploadedFile){
            $media = new MediaEloquent ();
            $info['avatar']->sort = 'image';
            $info['avatar']->path = 'avatar/admin';
            if($return = $media->create($info['avatar'])){
                $info['avatar'] = $return[0];
            }
        }
        if(isset($info['password'])) {
            $info['password'] = password_hash($info['password'], PASSWORD_BCRYPT);
        }
        if(AdminModel::where('id',$id)->update($info)){
            if($info['avatar']){ //delete before avatar
                $old_avatar = $media->show((integer)$before->avatar)->path;
                $media->delete((integer)$before->avatar);
                @unlink(public_path($old_avatar));
            }
            event('log',[[$this->module,'u',['before'=>$before,'after'=>AdminModel::findOrFail($id)->toArray()]]]);

            return 1;
        }
    }
}