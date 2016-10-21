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

    public function operate($user, $payload, $strict = false)
    {
        return $this->admin->checkPermission($user, $payload, $strict);
    }
}