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
use App\Models\Role as RoleModel;
use Illuminate\Support\Facades\DB;
use App\Models\Administrator as AdminModel;
use App\Models\Permission as PermissionModel;
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
            $permissions = $this->getPermissions($value['id'], true);
            $value['permissions'] = $permissions ? $permissions : [];

            return $value;
        }, $users['data']);

        return $users;
    }

    public function show()
    {
        return AdminModel::where('administrators.id', Auth::id())->leftJoin('images', 'administrators.avatar', '=',
            'images.id')->select('administrators.*', 'images.thumb as avatar_path')->first();
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
        $timenow = Carbon::now();
        $currentUser->update(
            [
                'last_login_time' => $currentUser->first()->login_at,
                'last_login_ip'   => $currentUser->first()->login_ip,
                'login_at'      => Carbon::now(),
                'login_ip'        => $info['ip'],
                'access_token'    => str_random(40),
                'token_expr_at'   => Date('Y-m-d H:i:s', strtotime($timenow) + 3600)
            ]);
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
        $info['login_time'] = Carbon::now();
        $info['login_ip'] = $info['ip'];

        if ($user = AdminModel::create($info)->toArray()) {
            $this->attachRolesToUser($user['id'], $info['role_ids']);
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

    //用户绑定角色
    public function attachRolesToUser($user_id, $role_ids = null)
    {
        if (!AdminModel::where('id', $user_id)->first()) {
            return ['errorCode' => 1004];
        }
        $role_ids = trim($role_ids) ? : env('DEFAULT_ROLE_IDS');
        $role_ids = array_unique(explode(',', $role_ids));
        $roles = array_map(function($y) {
            return $y['id'];
        }, RoleModel::get()->toArray());
        $params = [];
        $role_ids = array_filter($role_ids, function($y) use ($roles, &$params, $user_id) {
            if (in_array($y, $roles)) {
                $params[] = ['role_id' => $y, 'user_id' => $user_id];

                return true;
            }

            return false;
        });
        if (empty($role_ids)) {
            return ['errorCode' => 1319];
        }
        DB::table('roles_users')->where('user_id', $user_id)->delete();
        if (DB::table('roles_users')->insert($params)) {
            env('log', [[$this->module, 'u', $params]]);
            $return = ['result' => 'success'];
        } else {
            $return = ['errorCode' => 1324];
        }

        return $return;
    }

    //角色绑定权限
    public function attachPermissionsToRole($role_id, $payload = null)
    {
        if (!RoleModel::where('id', $role_id)->first()) {
            return ['errorCode' => 1319];
        }
        $payload = trim($payload) ? : env('DEFAULT_PERMISSION_IDS');
        $payload = array_unique(explode(',', $payload));
        $permission_ids = array_map(function($y) {
            return $y['id'];
        }, PermissionModel::get()->toArray());
        $params = [];
        $payload = array_filter($payload, function($y) use ($permission_ids, &$params, $role_id) {
            if (in_array($y, $permission_ids)) {
                $params[] = ['role_id' => $role_id, 'permission_id' => $y];

                return true;
            }

            return false;
        });
        if (empty($payload)) {
            return ['errorCode' => 1321];
        }
        DB::table('roles_permissions')->where('role_id', $role_id)->delete();
        if (DB::table('roles_permissions')->insert($params)) {
            env('log', [[$this->module, 'u', $params]]);
            $return = ['result' => 'success'];
        } else {
            $return = ['errorCode' => 1323];
        }

        return $return;
    }

    //检测用户是否有权限
    public function checkPermissions($user_id, array $payload, $strict = false)
    {
        if (empty($payload)) {
            return true;
        }
        $permissions = $this->getPermissions($user_id);
        $needs = array_filter($payload, function($y) use ($permissions) {
            return in_array($y, $permissions, 1);
        });
        if (empty($needs)) {
            return false;
        }

        return $strict ? $needs === $payload : true;
    }

    //获取用户所有权限
    protected function getPermissions($user_id, $is_name = false)
    {
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
        $permissions = array_map(function($y) use ($is_name) {
            return $is_name ? $y['name'] : $y['pname'];
        }, PermissionModel::whereIn('id', $permission_ids)->get()->toArray());

        return $permissions;
    }
}