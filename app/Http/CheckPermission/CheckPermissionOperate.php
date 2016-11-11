<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/17
 * Time: 下午1:08
 */
namespace App\Http\CheckPermission;

use App\Repositories\InterfacesBag\Administrator;

class CheckPermissionOperate
{
    protected $admin;

    public function __construct(Administrator $admin)
    {
        $this->admin = $admin;
    }

    public function check($user, $payload, $strict = false)
    {
        return $this->admin->checkPermissions($user->id, $payload, $strict);
    }

    public function getPermissions($user)
    {
        $resp = $this->admin->getPermissions($user->id);

        return json_encode($resp);
    }
}