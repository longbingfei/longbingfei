<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/6/12
 * Time: 下午3:21
 */
namespace App\Repositories\InterfacesBag;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface Video extends BaseInterface
{
    public function index($condition = []);

    public function show($id);

    public function create(UploadedFile $file);

    public function delete($id);
}