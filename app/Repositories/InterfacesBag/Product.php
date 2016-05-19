<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/19
 * Time: 上午9:18
 */
namespace App\Repositories\InterfacesBag;

interface Product extends BaseInterface{
    public function index();
    public function show($id);
    public function create(array $data);
    public function update($id,array $data);
    public function delete($id);
}