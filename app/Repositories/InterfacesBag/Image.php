<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/20
 * Time: 下午1:13
 */
namespace App\Repositories\InterfacesBag;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface Image extends BaseInterface
{
    public function index($condition = []);

    public function show($id);

    public function create(UploadedFile $file, array $params = []);

    public function delete($ids);
}