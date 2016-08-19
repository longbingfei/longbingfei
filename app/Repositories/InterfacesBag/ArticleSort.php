<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/19
 * Time: 上午9:16
 */
namespace App\Repositories\InterfacesBag;

interface ArticleSort extends BaseInterface
{
    public function index($fid = 0);

    public function create(array $data);

    public function update($id, $name);

    public function delete($id);
}