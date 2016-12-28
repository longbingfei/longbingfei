<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/12/28
 * Time: 上午9:52
 */
namespace App\Repositories\Eloquents;

use Illuminate\Support\Facades\Auth;
use App\Models\Gallery as GalleryModel;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Repositories\InterfacesBag\Image as ImageInterface;
use App\Repositories\InterfacesBag\Gallery as GalleryInterface;

class Gallery implements GalleryInterface
{
    protected $module = 'gallery';

    protected $image;

    public function __construct(ImageInterface $image)
    {
        $this->image = $image;
    }

    public function index(array $condition)
    {
        $condition = array_filter($condition, 'strlen');
        $page = isset($condition['page']) ? $condition['page'] : 1;
        $per_page_num = isset($condition['per_page_num']) ? $condition['per_page_num'] : 15;
        $gallery = GalleryModel::where('id', '>', '1');
        array_map(function($y) use (&$gallery, $condition) {
            if (isset($condition[$y])) {
                $w = in_array($y, ['keywords', 'title']) ? '%' . $condition[$y] . '%' : $condition[$y];
                $gallery = $gallery->where($y, $w);
            }
        }, ['keywords', 'title', 'weight']);
        $gallery = $gallery->paginate($per_page_num, ['*'], 'page', $page)->toArray();

        return $gallery;
    }

    public function show($id)
    {
        if (!$gallery = GalleryModel::find($id)) {
            return ['errorCode' => 1700];
        }

        return $gallery->toArray();
    }

    public function create(array $data)
    {
        $params = [];
        if (!$params['title'] = $data['title']) {
            return ['errorCode' => 1701];
        }
        if ($file = $data['file']) {
            $images = array_map(function(UploadedFile $image) {
                $mime = $image->getClientMimeType();
                if (strpos($mime, 'image/') !== 0) {
                    return null;
                }
                $params = [
                    'path'       => 'gallery/origin/' . Date('Y/m/d'),
                    'thumb_path' => 'gallery/thumb/' . Date('Y/m/d'),
                    'sort_id'    => 5,
                ];

                return $this->image->create($image, $params);
            }, (array)$file);
            $images = array_filter($images);
            if (!empty($images)) {
                $describes = [];
                array_map(function($y) use ($data, &$describes) {
                    $describes[$y] = isset($data['describes'][$y]) ? $data['describes'][$y] : null;
                }, array_keys($images));
                $params['images'] = json_encode($images);
                $params['describes'] = json_encode($describes);
                $index_id = $data['index_id'];
                $params['index_pic'] = isset($images[$index_id]) ? json_encode($images[$index_id]) : json_encode(current($images));
            }
        }
        if ($data['tags']) {
            $params['tags'] = $data['tags'];
        }
        if (!is_null($data['weight'])) {
            $params['weight'] = intval($data['weight']);
        }
        $params['user_id'] = Auth::Id();
        if (!$gallery = GalleryModel::create($params)) {
            return ['errorCode' => 1702];
        }
        event('log', [[$this->module, 'c', $gallery]]);

        return $gallery->toArray();
    }

    public function update($id, array $data)
    {
    }

    public function delete($id)
    {
    }
}