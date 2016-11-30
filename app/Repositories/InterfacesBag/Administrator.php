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

    public function delete($id);

    public function getAllRoles();

    public function getAllPermissions();

    public function attachPermissionsToRole($role_id, $permission_ids = null);

    public function attachRolesToUser($user_id, $role_ids = null);

    public function checkPermissions($user_id, array $permissions, $strict = false);

    public function getPermissions($user_id, $is_name = false);
}