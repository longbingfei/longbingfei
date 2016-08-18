<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/19
 * Time: 上午9:09
 */
namespace App\Repositories\InterfacesBag;

interface ProductSort extends BaseInterface
{
    public function index();

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}