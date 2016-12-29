<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/12/28
 * Time: 上午9:52
 */
namespace App\Repositories\Eloquents;

use App\Models\GallerySort;
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
        $orderby = isset($condition['orderby']) ? $condition['orderby'] : 'id';
        $order = isset($condition['order']) && $condition['order'] === 'asc' ? 'asc' : 'desc';
        $gallery = GalleryModel::where('galleries.id', '>', '0');
        array_map(function($y) use (&$gallery, $condition) {
            if (isset($condition[$y])) {
                $m = '=';
                $w = $condition[$y];
                if (in_array($y, ['keywords', 'title'])) {
                    $m = 'like';
                    $w = '%' . $condition[$y] . '%';
                }
                $gallery = $gallery->where('galleries.' . $y, $m, $w);
            }
        }, ['keywords', 'title', 'weight']);
        $gallery = $gallery
            ->leftJoin('gallery_sorts as gs', 'galleries.sort_id', '=', 'gs.id')
            ->leftJoin('administrators as admin', 'galleries.user_id', '=', 'admin.id')
            ->select('galleries.*', 'gs.name as sort_name', 'admin.username as username')
            ->orderby('galleries.' . $orderby, $order)
            ->paginate($per_page_num, ['*'], 'page', $page)
            ->toArray();
        $gallery['data'] = array_map(function($y) {
            $y['index_pic'] = json_decode($y['index_pic'], 1);
            $y['images'] = json_decode($y['images'], 1);
            $y['describes'] = json_decode($y['describes'], 1);

            return $y;
        }, $gallery['data']);

        return $gallery;
    }

    public function show($id)
    {
        if (!$gallery = GalleryModel::find($id)) {
            return ['errorCode' => 1700];
        }
        $gallery = $gallery->leftJoin('gallery_sorts as gs', 'galleries.sort_id', '=', 'gs.id')
            ->leftJoin('administrators as admin', 'galleries.user_id', '=', 'admin.id')
            ->select('galleries.*', 'gs.name as sort_name', 'admin.username as username')
            ->where('galleries.id', $id)
            ->first()
            ->toArray();
        $gallery['index_pic'] = json_decode($gallery['index_pic'], 1);
        $gallery['images'] = json_decode($gallery['images'], 1);
        $gallery['describes'] = json_decode($gallery['describes'], 1);

        return $gallery;
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
                $params['images'] = json_encode(array_values($images));
                $params['describes'] = json_encode(array_values($describes));
            }
            $params['index_pic'] = isset($images[$data['index_id']]) ? json_encode($images[$data['index_id']]) : json_encode(current($images) ? : []);
        }
        if ($data['tags']) {
            $params['tags'] = $data['tags'];
        }
        $params['sort_id'] = GallerySort::find(intval($data['sort_id'])) ? intval($data['sort_id']) : 1;
        if (!is_null($data['weight'])) {
            $params['weight'] = intval($data['weight']);
        }
        $params['user_id'] = Auth::Id();
        if (!$gallery = GalleryModel::create($params)) {
            return ['errorCode' => 1702];
        }
        event('log', [[$this->module, 'c', $gallery]]);
        $gallery['sort_name'] = GallerySort::find($gallery->sort_id)->name;
        $gallery['user_name'] = Auth::user()->username;
        $gallery['index_pic'] = json_decode($gallery['index_pic'], 1);
        $gallery['images'] = json_decode($gallery['images'], 1);
        $gallery['describes'] = json_decode($gallery['describes'], 1);

        return $gallery;
    }

    public function update($id, array $data)
    {
        if (!$gallery = GalleryModel::find($id)) {
            return ['errorCode' => 1700];
        }
        $params = [];
        if ($data['title']) {
            $params['title'] = $data['title'];
        }
        $pImages = json_decode($gallery->images, 1);
        $pDescribes = json_decode($gallery->describes, 1);
        $pIndexPic = json_decode($gallery->index_pic, 1);
        $dropImages = [];
        //如果有图片删除,则过滤掉确实存在且需要删除的图片、注释
        if ($drop_image_ids = $data['drop_image_ids']) {
            $drop_image_ids = explode(',', $drop_image_ids);
            array_map(function($y) use ($drop_image_ids, &$pImages, &$pDescribes, &$dropImages) {
                if (in_array($pImages[$y]['id'], $drop_image_ids)) {
                    $dropImages[] = $pImages[$y]['id'];
                    unset($pImages[$y], $pDescribes[$y]);
                }
            }, array_keys($pImages));
            //如果删除的图片中有索引图,剩余不为空则默认第一个索引图
            if (!empty($pIndexPic) && in_array($pIndexPic['id'], $drop_image_ids)) {
                $index_pic = current($pImages);
                $params['index_pic'] = json_encode($index_pic ? : []);
            }
        }
        //如果有新建图片,则入图片库
        if ($file = $data['file']) {
            $file = is_array($file) ? $file : [$file];
            $nImages = array_map(function(UploadedFile $image) {
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
            }, $file);
            $nImages = array_filter($nImages);
            //新建图片数组不为空则追加图片和注释到对应的过滤数组之后
            if (!empty($nImages)) {
                array_map(function($y) use ($data, $nImages, &$pImages, &$pDescribes) {
                    $pImages[] = $nImages[$y];
                    $pDescribes[] = isset($data['describes'][$y]) ? $data['describes'][$y] : null;
                }, array_keys($nImages));
                //新建图片组若存在索引图则设置为相册索引图
                if (!is_null($data['index_id']) && isset($nImages[$data['index_id']])) {
                    $params['index_pic'] = json_encode($nImages[$data['index_id']]);
                }
            }
        }
        $params['images'] = json_encode(array_values($pImages));
        $params['describes'] = json_encode(array_values($pDescribes));
        if ($data['tags']) {
            $params['tags'] = $data['tags'];
        }
        if ($data['sort_id'] && GallerySort::find(intval($data['sort_id']))) {
            $params['sort_id'] = intval($data['sort_id']);
        }
        if (!is_null($data['weight'])) {
            $params['weight'] = intval($data['weight']);
        }
        $params['user_id'] = Auth::Id();
        $before = $gallery->toArray();
        if (!$gallery->update($params)) {
            //更新失败,则删除新建图片数组。
            if (isset($nImages) && !empty($nImages)) {
                $image_ids = [];
                array_map(function($y) use (&$image_ids) {
                    $image_ids[] = $y['id'];
                }, $nImages);
                $this->image->delete(implode(',', $image_ids));
            }

            return ['errorCode' => 1703];
        }
        $after = $gallery->toArray();
        //更新成功,则删除丢弃图片数组
        if (!empty($dropImages)) {
            $this->image->delete(implode(',', $dropImages));
        }
        event('log', [[$this->module, 'u', ['before' => $before, 'after' => $after]]]);
        $after['sort_name'] = GallerySort::find($after['sort_id'])->name;
        $after['user_name'] = Auth::user()->username;
        $after['index_pic'] = json_decode($after['index_pic'], 1);
        $after['images'] = json_decode($after['images'], 1);
        $after['describes'] = json_decode($after['describes'], 1);

        return $after;
    }

    public function delete($id)
    {
        if (!$gallery = GalleryModel::find($id)) {
            return ['errorCode' => 1700];
        }
        $before = $gallery->toArray();
        if (!$gallery->delete()) {
            return ['errorCode' => 1704];
        }
        $images = json_decode($before['images'], 1);
        if (!empty($images)) {
            $image_ids = [];
            array_map(function($y) use (&$image_ids) {
                $image_ids[] = $y['id'];
            }, $images);
            $this->image->delete(implode(',', $image_ids));
        }
        event('log', [[$this->module, 'd', $before]]);

        return $before;
    }
}