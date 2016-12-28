<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/12/28
 * Time: 上午9:52
 */
namespace App\Repositories\Eloquents;

use App\Models\Gallery as GalleryModel;
use App\Repositories\InterfacesBag\Gallery as GalleryInterface;

class Gallery implements GalleryInterface
{
    protected $module = 'gallery';

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
    }

    public function create(array $data)
    {
    }

    public function update($id, array $data)
    {
    }

    public function delete($id)
    {
    }
}