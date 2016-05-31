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

    public function index($condition = []){
        return MediaModel::leftJoin('administrators','administrators.id','=','medias.user_id')->select('medias.*',
            'administrators.username')->orderBy('created_at','DESC')->get()->groupBy('sort');
    }
    public function show($id){
        return MediaModel::where('medias.id',$id)->leftJoin("administrators",'administrators.id','=','medias.user_id')
            ->select('medias.*','administrators.username')->first();
    }
    public function create(UploadedFile $file){
        $path = isset($file->path) ? $file->path : 'media/'.$file->sort.'/'.Date('Y/m/d');
        if(!$this->checkDir(public_path($path))){
            event('log',[[$this->module,'c','mkdir@'.public_path($path).'failed!',0]]);

            return 0;
        }
        $basename = str_random(32);
        $name  = $basename.'.'.$file->guessExtension();
        $file->move($path,$name);

        $mediaInfo = [
            'title'=>$file->title,
            'sort'=>$file->sort,
            'path' => $path.'/'.$name,
            'user_id'=>Auth::id(),
        ];
        //截图名称和视频相同
        if($file->sort === 'video'){
            if($framePath = $this->getFrameImage($path.'/'.$name,'media/video/frames',$basename)){
                $mediaInfo['frame_id'] = MediaModel::create(['title'=>'视频截图','sort'=>'frame','path'=>$framePath,
                    'user_id'=>Auth::id()])
                    ->id;
            }
        }

        if($info = MediaModel::create($mediaInfo)){
            event('log',[[$this->module,'c',$info]]);

            return [$info->id,$info->title,$path.'/'.$name];
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

    protected function getFrameImage($video,$path,$imageName){
        $size = '640x480';
        $type = 'png';
        $framePath = public_path($path.'/'.$imageName.'.'.$type);
        if($this->checkDir(public_path($path))){
            $cmd = 'ffmpeg -i '.public_path($video).' -ss 2.1 -t 0.001 -q:v 2 -f image2 -s '.$size.' '.$framePath;
            @exec($cmd);
        }

        return is_file($framePath) ? $path.'/'.$imageName.'.'.$type : false;
    }
}