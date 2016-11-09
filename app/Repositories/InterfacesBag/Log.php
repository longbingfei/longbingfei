<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/11/9
 * Time: 上午10:27
 */
namespace App\Repositories\InterfacesBag;
interface Log extends BaseInterface
{
    public function index(array $condition);
}