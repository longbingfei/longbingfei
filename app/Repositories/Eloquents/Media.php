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
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Auth;

class Media implements MediaInterface{
    protected $module = 'media';

    public function show($id){
        return MediaModel::findOrFail($id);
    }
    public function create(UploadedFile $file){
        $path = 'media/'.$file->sort.'/'.Date('Y/m/d');
        if(!$this->checkDir(public_path($path))){
            event('log',[[$this->module,'c','mkdir@'.public_path($path).'failed!',0]]);

            return 0;
        }
        $name  = str_random(32).'.'.$file->guessExtension();
        $file->move($path,$name);
        $mediaInfo = [
            'sort'=>$file->sort,
            'path' => $path.'/'.$name,
            'user_id'=>Auth::id(),
        ];

        if($info = MediaModel::create($mediaInfo)){
            event('log',[[$this->module,'c',$info]]);

            return [$info->id,$path.'/'.$name];
        }
    }
    public function delete($id){
        $media = MediaModel::findOrFail($id);
        if(MediaModel::destroy($id)){
            event('log',[[$this->module,'d',$media]]);

            return 1;
        }
    }

    protected function checkDir($path){
        if(!is_dir($path)){
            @mkdir($path,0775,1);
        }

        return is_dir($path) && is_writeable($path);
    }
}