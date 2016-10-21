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
use Illuminate\Support\Facades\DB;
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

    public function index(array $condition = [])
    {
        $page = intval($condition['page']) ? intval($condition['page']) : 1;
        $perpage = intval($condition['per_page_num']) ? intval($condition['per_page_num']) : 10;
        $users = AdminModel::paginate($perpage, ['*'], 'page', $page)->toArray();
        $users['data'] = array_map(function($value) {
            $value['avatar'] = $value['avatar'] ? unserialize($value['images']) : [];

            return $value;
        }, $users['data']);

        return $users;
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
        if (AdminModel::where('id', $id)->update($info)) {
            $after = AdminModel::where('id', $id)->first()->toArray();
            if (isset($info['avatar']) && ($image = unserialize($before->avatar))) { //delete before avatar
                $this->image->delete($image['id']);
            }
            event('log', [[$this->module, 'u', ['before' => $before, 'after' => $after]]]);

            return $after;
        }
    }

    public function attachPermissionToRole($role_id, array $permission_ids)
    {

    }

    public function checkPermission($user_id, array $payload, $strict = false)
    {
        if (empty($payload)) {
            return true;
        }
        $role_ids = DB::table('roles_users')->where('user_id', $user_id)->get(['role_id']);
        if (empty($role_ids)) {
            return false;
        }
        $role_ids = array_map(function($y) {
            return $y->role_id;
        }, $role_ids);
        $permission_ids = DB::table('roles_permissions')->whereIn('role_id', $role_ids)->get();
        $permission_ids = array_unique(array_map(function($y) {
            return $y->permission_id;
        }, $permission_ids));
        if (empty($permission_ids)) {
            return false;
        }
        $permissions = DB::table('permissions')->whereIn('id', $permission_ids)->get();
        $permissions = array_map(function($y) {
            return $y->pname;
        }, $permissions);
        $needs = array_filter($payload, function($y) use ($permissions) {
            return in_array($y, $permissions, 1);
        });
        if (empty($needs)) {
            return false;
        }

        return $strict ? $needs === $payload : true;
    }
}