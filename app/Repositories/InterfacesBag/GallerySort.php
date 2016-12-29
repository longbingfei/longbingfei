<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/12/29
 * Time: 上午10:58
 */
namespace App\Repositories\InterfacesBag;

interface GallerySort extends BaseInterface
{
    public function index();

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}