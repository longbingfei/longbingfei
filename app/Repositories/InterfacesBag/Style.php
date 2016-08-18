<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/6/13
 * Time: 下午3:01
 */
namespace App\Repositories\InterfacesBag;

interface Style extends BaseInterface
{
    public function index();

    public function show($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}