<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/23
 * Time: 上午11:47
 */
namespace App\Repositories\InterfacesBag;

interface User extends BaseInterface
{
    public function validate(array $info);

    public function verifyToken($token);

    public function logout($user_id);
}