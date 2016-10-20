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
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Repositories\InterfacesBag\Image as ImageInterface;
use App\Repositories\InterfacesBag\Administrator as AdminInterface;

define('ADMIN_AVATAR_PATH', 'avatar/admin');

class Administrator implements AdminInterface
{
    protected $module = 'auth';

    protected $image;

    public function __construct(ImageInterface $image)
    {
        $this->image = $image;
    }

    public function index()
    {
        return AdminModel::all();
    }

    public function show()
    {
        return AdminModel::where('administrators.id', Auth::id())->leftJoin('medias', 'administrators.avatar', '=', 'medias.id')->select
        ('administrators.*', 'medias.path as avatar_path')->first();
    }

    public function login(array $info)
    {
        $userInfo = AdminModel::where('username', trim($info['username']));
        if (!$userInfo->count()) {
            return ['errorCode' => 1007];
        }
        $password = $userInfo->first()->password;
        if (!password_verify(trim($info['password']), $password)) {
            return ['errorCode' => 1003];
        }
        Auth::login($userInfo->first());
        if (!Auth::check()) {
            return ['errorCode' => 1008];
        }
        $currentUser = AdminModel::where('id', Auth::id());
        $currentUser->update(['last_login_time' => Carbon::now(), 'last_login_ip' => $info['ip']]);
        event('log', [[$this->module, 'l', Auth::User()->toArray()]]);

        return true;
    }

    public function register(array $info)
    {
        if (AdminModel::where('username', $info['username'])->count()) {
            event('log', [[$this->module, 'r', 'username has already exists', 0]]);

            return ['errorCode' => 1005];
        }
        $info['password'] = password_hash($info['password'], PASSWORD_BCRYPT);
        $info['creator_id'] = Auth::id();
        $info['last_login_time'] = Carbon::now();
        $info['last_login_ip'] = $info['ip'];

        if ($user = AdminModel::create($info)->toArray()) {
            event('log', [[$this->module, 'r', $user]]);

            return $user;
        }
    }

    public function update($id, array $info)
    {
        $info = array_filter($info);
        if (!$before = AdminModel::where('id', $id)->first()) {
            return ['errorCode' => 1004];
        }
        if (isset($info['file']) && $info['file'] instanceof UploadedFile) {
            $avatar_params = [
                'path'        => ADMIN_AVATAR_PATH . '/' . $id,
                'thumb_path'  => ADMIN_AVATAR_PATH . '/' . $id . '/thumb',
                'thumb_width' => 180
            ];
            $avatar = $this->image->create($info['file'], $avatar_params);
            $info['avatar'] = serialize($avatar);
            unset($info['file']);
        }
        if (isset($info['password'])) {
            $info['password'] = password_hash($info['password'], PASSWORD_BCRYPT);
        }
        if ($before->update($info)) {
            $after = AdminModel::where('id', $id)->first()->toArray();
            if (isset($info['avatar']) && ($image = unserialize($before->avatar))) { //delete before avatar
                $this->image->delete($image['id']);
            }
            event('log', [[$this->module, 'u', ['before' => $before, 'after' => $after]]]);

            return $after;
        }
    }

    public function hasPermission($user, array $permissions)
    {

    }
}