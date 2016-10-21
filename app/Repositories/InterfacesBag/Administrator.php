<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/16
 * Time: 下午4:01
 */
namespace App\Repositories\InterfacesBag;
interface Administrator extends BaseInterface
{
    public function index();

    public function login(array $info);

    public function register(array $info);

    public function update($id, array $info);

    public function attachPermissionsToRole($role_id, $permission_ids);

    public function attachRolesToUser($user_id, $role_ids);

    public function checkPermissions($user_id, array $permissions, $strict = false);
}