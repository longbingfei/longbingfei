<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/6/12
 * Time: 下午3:24
 */
namespace App\Repositories\Eloquents;

use Auth;
use App\Models\Image as ImageModel;
use App\Models\Video as VideoModel;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Repositories\InterfacesBag\Image as ImageInterface;
use App\Repositories\InterfacesBag\Video as VideoInterface;

class Video implements VideoInterface
{
    protected $module = 'video';

    protected $image;

    public function __construct(ImageInterface $image)
    {
        $this->image = $image;
    }

    public function index($condition = [])
    {
        return VideoModel::leftJoin('administrators', 'administrators.id', '=', 'videos.user_id')->leftJoin
        ('video_sorts', 'video_sorts.id', '=', 'videos.sort_id')->select('videos.*', 'video_sorts.name as sort_name',
            'administrators.username')->orderBy('videos.created_at', 'DESC')->get()->groupBy('sort_id');
    }

    public function show($id)
    {
        if (!$resp = VideoModel::find($id)) {
            return ['errorCode' => 1503];
        }

        return $resp->toArray();
    }

    public function create(UploadedFile $file)
    {
        $path = isset($file->path) ? $file->path : 'videos/' . Date('Y/m/d');
        if (!$this->checkDir(public_path($path))) {
            event('log', [[$this->module, 'c', 'mkdir@' . public_path($path) . 'failed!', 0]]);

            return ['errorCode' => 1500];
        }
        $extension = $file->guessExtension();
        $basename = microtime(true) * 10000;
        $name = $basename . '.' . $extension;
        $originName = rtrim($file->getClientOriginalName(), '.' . $extension) ? : '新建视频文件';
        $file->move($path, $name);
        $videoInfo = [
            'name'    => @$file->name ? $file->name : $originName,
            'sort_id' => @$file->sort_id ? $file->sort_id : 2, //1系统,2普通
            'path'    => $path . '/' . $name,
            'user_id' => Auth::id(),
        ];
        if (!$framePath = $this->getFrameImage($path . '/' . $name, 'frames/' . Date('Y/m/d'), $basename)) {
            return ['errorCode' => 1504];
        }
        $videoInfo['frame_path'] = $this->image->createFormExistImage([
            'name'    => '视频截图-' . $originName,
            'sort_id' => '3',
            'path'    => $framePath,
            'user_id' => Auth::id()
        ])['path'];
        if (!$info = VideoModel::create($videoInfo)) {
            return ['errorCode' => 1501];
        }
        event('log', [[$this->module, 'c', $info]]);

        return [
            'id'         => $info->id,
            'name'       => $info->name,
            'path'       => $info->path,
            'frame_path' => $info->frame_path
        ];
    }

    public function delete($id)
    {
        if (!$media = VideoModel::find($id)) {
            return ['errorCode' => 1503];
        }
        $path = $media->path;
        $framePath = $media->frame_path;
        if (!$media->delete($id)) {
            return ['errorCode' => 1502];
        }
        @unlink(public_path($path));
        if ($image = ImageModel::where('path', $framePath)->first()) {
            $this->image->delete($image->id);
            @unlink(public_path($framePath));
        }
        event('log', [[$this->module, 'd', $media]]);

        return $media->toArray();
    }

    protected function checkDir($path)
    {
        if (!is_dir($path)) {
            @mkdir($path, 0775, 1);
        }

        return is_dir($path) && is_writeable($path);
    }

    protected function getFrameImage($video, $path, $imageName)
    {
        $size = '640x480';
        $type = 'png';
        $framePath = public_path($path . '/' . $imageName . '.' . $type);
        if (!$this->checkDir(public_path($path))) {
            return false;
        }
        $cmd = 'ffmpeg -i ' . public_path($video) . ' -ss 2.1 -t 0.001 -q:v 2 -f image2 -s ' . $size . ' ' . $framePath;
        @exec($cmd);

        return is_file($framePath) ? $path . '/' . $imageName . '.' . $type : false;
    }
}