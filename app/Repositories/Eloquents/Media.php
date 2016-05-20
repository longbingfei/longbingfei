<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/20
 * Time: 下午1:14
 */
namespace App\Repositories\Eloquents;
use App\Repositories\InterfacesBag\Media as MediaInterface;
use App\Models\Media as MediaModel;
class Media implements MediaInterface{
    protected $module = 'media';
    public function show($id){}
    public function create(array $data){}
    public function delete($id){}
}