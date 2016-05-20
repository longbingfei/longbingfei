<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/20
 * Time: 下午1:13
 */
namespace App\Repositories\InterfacesBag;

interface Media extends BaseInterface{
    public function show($id);
    public function create(array $data);
    public function delete($id);
}