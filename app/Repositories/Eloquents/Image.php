<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/6/12
 * Time: 下午3:22
 */
namespace App\Repositories\Eloquents;

use Auth;
use App\Models\Image as ImageModel;
use Intervention\Image\Facades\Image as ImageContarct;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Repositories\InterfacesBag\Image as ImageInterface;

class Image implements ImageInterface
{
    protected $module = 'image';

    //图片列表
    public function index($condition = [])
    {
        return ImageModel::leftJoin('administrators', 'administrators.id', '=', 'images.user_id')
            ->leftJoin('image_sorts', 'image_sorts.id', '=', 'images.sort_id')
            ->select('images.*', 'image_sorts.name as sort_name', 'administrators.username')
            ->where('images.sort_id', '<>', 1)
            ->orderBy('images.created_at', 'DESC')
            ->get();
    }

    //图片详情
    public function show($id)
    {
        if (!$return = ImageModel::where('id', $id)->first()) {
            return ['errorCode' => 1102];
        }

        return $return;
    }

    //图片上传
    public function create(UploadedFile $file, array $params = [])
    {
        $path = isset($params['path']) && $params['path'] ? $params['path'] : 'images/origin/' . Date('Y/m/d');
        if (!$this->checkDir(public_path($path))) {
            event('log', [[$this->module, 'c', 'mkdir@' . public_path($path) . 'failed!', 0]]);

            return ['errorCode' => 1100];
        }
        $basename = microtime(true) * 10000;
        $name = $basename . '.' . $file->guessExtension();
        $file->move($path, $name);
        $thumbPath = isset($params['thumb_path']) && $params['thumb_path'] ? $params['thumb_path'] : 'images/thumb/' . Date('Y/m/d');
        if (!$this->checkDir(public_path($thumbPath))) {
            event('log', [[$this->module, 'c', 'mkdir@' . public_path($thumbPath) . 'failed!', 0]]);

            return ['errorCode' => 1100];
        }
        ImageContarct::make($path . '/' . $name)->resize(isset($params['thumb_width']) && $params['thumb_width'] ? $params['thumb_width'] : 320, null, function($constraint) {
            $constraint->aspectRatio();
        })->save($thumbPath . '/' . $name);
        $imageInfo = [
            'name'    => isset($params['name']) && $params['name'] ? $params['name'] : basename($file->getClientOriginalName(),'.'.$file->getClientOriginalExtension()),
            'sort_id' => isset($params['sort_id']) && $params['sort_id'] ? $params['sort_id'] : 4, //1系统,2截图,3商品,4普通
            'path'    => $path . '/' . $name,
            'thumb'   => $thumbPath . '/' . $name,
            'user_id' => Auth::id(),
        ];
        if ($info = ImageModel::create($imageInfo)) {
            event('log', [[$this->module, 'c', $info]]);

            return $info->toArray();
        }
    }

    //创建目录
    protected function checkDir($path)
    {
        if (!is_dir($path)) {
            @mkdir($path, 0775, 1);
        }

        return is_dir($path) && is_writeable($path);
    }

    //图片删除
    public function delete($ids)
    {
        $ids = explode(',', $ids);
        $image = ImageModel::whereIn('id', $ids)->get()->toArray();
        if (empty($image)) {
            return ['errorCode' => 1102];
        }
        $result = array_map(function($y) {
            if ($y['sort_id'] == 1) {
                return [$y['id'] => 1105];
            }
            if (ImageModel::destroy($y['id'])) {
                @unlink(public_path($y['path']));
                @unlink(public_path($y['thumb']));
                event('log', [[$this->module, 'd', $y]]);

                return [$y['id'] => 'success'];
            }
        }, $image);
        $resp = ['success' => [], 'failed' => []];
        array_map(function($y) use (&$resp) {
            if (current($y) == 'success') {
                $resp['success'][] = key($y);
            } else {
                $resp['failed'][] = ['id' => key($y), 'error' => config('error.' . current($y))];
            }
        }, $result);

        return $resp;
    }
}