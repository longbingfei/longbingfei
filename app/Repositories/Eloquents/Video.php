<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/6/12
 * Time: 下午3:24
 */
namespace App\Repositories\Eloquents;
use App\Repositories\InterfacesBag\Video as VideoInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Models\Video as VideoModel;
use App\Models\Image as ImageModel;
use Auth;
class Video implements VideoInterface{
    protected $module = 'video';
    public function index($condition = []){
        return VideoModel::leftJoin('administrators','administrators.id','=','videos.user_id')->leftJoin
        ('video_sorts','video_sorts.id','=','videos.sort_id')->select('videos.*','video_sorts.name as sort_name',
            'administrators.username')->orderBy('videos.created_at','DESC')->get()->groupBy('sort_id');
    }
    public function show($id){
        return VideoModel::findOrFail($id);
    }
    public function create(UploadedFile $file){
        $path = isset($file->path) ? $file->path : 'videos/'.Date('Y/m/d');
        if(!$this->checkDir(public_path($path))){
            event('log',[[$this->module,'c','mkdir@'.public_path($path).'failed!',0]]);

            return 0;
        }
        $basename = microtime(true) * 10000;
        $name  = $basename.'.'.$file->guessExtension();
        $file->move($path,$name);

        $videoInfo = [
            'name'=> @$file->name ? $file->name : "新建视频文件",
            'sort_id'=> @$file->sort_id ? $file->sort_id : 2, //1系统,2普通
            'path' => $path.'/'.$name,
            'user_id'=>Auth::id(),
        ];
        if($framePath = $this->getFrameImage($path.'/'.$name,'frames/'.Date('Y/m/d'),$basename)){
            $videoInfo['frame_path'] =ImageModel::create(['name'=>'视频截图','sort_id'=>'3','path'=>$framePath,
                'user_id'=>Auth::id()])
                ->path;
        }
        if($info = VideoModel::create($videoInfo)){
            event('log',[[$this->module,'c',$info]]);

            return ['id'=>$info->id,'name'=>$info->name,'path'=>$info->path,'frame_path'=>$info->frame_path];
        }
    }
    public function delete($id){
        $media = VideoModel::findOrFail($id);
        $path = $media->path;
        $framePath = $media->frame_path;
        if(VideoModel::destroy($id)){
            @unlink(public_path($path));
            ImageModel::where('path',$framePath)->delete();
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