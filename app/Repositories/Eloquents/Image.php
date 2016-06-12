<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/6/12
 * Time: 下午3:22
 */
namespace App\Repositories\Eloquents;
use App\Repositories\InterfacesBag\Image as ImageInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Models\Image as ImageModel;
use Auth;
class Image implements ImageInterface{
    protected $module = 'image';

    public function index($condition = []){
        return ImageModel::leftJoin('administrators','administrators.id','=','images.user_id')->leftJoin
        ('image_sorts','image_sorts.id','=','images.sort_id')->select('images.*','image_sorts.name as sort_name',
            'administrators.username')->orderBy('images.created_at','DESC')->get()->groupBy('sort_id');
    }
    public function show($id){
        return ImageModel::findOrFail($id);
    }
    public function create(UploadedFile $file){
        $path = isset($file->path) ? $file->path : 'images/'.Date('Y/m/d');
        if(!$this->checkDir(public_path($path))){
            event('log',[[$this->module,'c','mkdir@'.public_path($path).'failed!',0]]);

            return 0;
        }
        $basename = microtime(true) * 10000;
        $name  = $basename.'.'.$file->guessExtension();
        $file->move($path,$name);

        $imageInfo = [
            'name'=> @$file->name ? $file->name : "新建图像文件",
            'sort_id'=> @$file->sort_id ? $file->sort_id : 3, //1系统,2截图,3普通
            'path' => $path.'/'.$name,
            'user_id'=>Auth::id(),
        ];
        if($info = ImageModel::create($imageInfo)){
            event('log',[[$this->module,'c',$info]]);

            return ['id'=>$info->id,'name'=>$info->name,'path'=>$path.'/'.$name];
        }
    }

    protected function checkDir($path){
        if(!is_dir($path)){
            @mkdir($path,0775,1);
        }

        return is_dir($path) && is_writeable($path);
    }

    public function delete($id){
        $media = ImageModel::findOrFail($id);
        $path = $media->path;
        if(ImageModel::destroy($id)){
            @unlink(public_path($path));
            event('log',[[$this->module,'d',$media]]);

            return 1;
        }
    }
}