<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/12/27
 * Time: 上午10:52
 */
namespace App\Repositories\InterfacesBag;
Interface Publish extends BaseInterface
{
    public function index(array $condition);

    public function show($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}