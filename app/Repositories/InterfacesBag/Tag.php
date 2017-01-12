<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 17/1/12
 * Time: 上午9:28
 */
namespace App\Repositories\InterfacesBag;

interface Tag extends BaseInterface
{
    public function index(array $condition);

    public function show($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}