<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/12/29
 * Time: 上午10:57
 */
namespace App\Repositories\Eloquents;

use Auth;
use App\Models\Gallery as GalleryModel;
use App\Models\GallerySort as GallerySortModel;
use App\Repositories\InterfacesBag\GallerySort as GallerySortInterface;

class GallerySort implements GallerySortInterface
{
    protected $module = 'gallery-sort';

    public function index(array $condition = [])
    {
        $condition = array_filter($condition);
        $sort = GallerySortModel::where('id', '>', 0);
        $fid = isset($condition['fid']) ? intval($condition['fid']) : 0;
        $sort = $sort->where('fid', $fid);

        return $sort->count() ? $sort->get()->toArray() : [];
    }

    public function create(array $data)
    {
        $data['user_id'] = Auth::id();
        $data['fid'] = isset($data['fid']) ? intval($data['fid']) : 0;
        $father = GallerySortModel::where('id', $data['fid'])->first();
        if ($data['fid'] && !$father) {
            return ['errorCode' => 1312];
        }
        if (GallerySortModel::where('fid', $data['fid'])->where('name', $data['name'])->count()) {
            event('log', [[$this->module, 'c', 'sort_already_exist', 0]]);

            return ['errorCode' => 1311];
        }
        $data['is_last'] = 1;
        $newSort = GallerySortModel::create($data)->toArray();
        event('log', [[$this->module, 'c', $newSort]]);
        if ($father && $father->is_last) {
            $this->update($father->id, ['is_last' => 0]);
        }

        return $newSort;
    }

    public function update($id, array $data)
    {
        $data['user_id'] = Auth::id();
        if (!$before = GallerySortModel::where('id', $id)->first()) {
            return ['errorCode' => 1313];
        }
        if (isset($data['name']) && GallerySortModel::where('fid', $before->fid)->where('name', $data['name'])->count()) {
            event('log', [[$this->module, 'u', 'sort_already_exist', 0]]);

            return ['errorCode' => 1311];
        }
        if (GallerySortModel::where('id', $id)->update($data)) {
            $after = GallerySortModel::where('id', $id)->first()->toArray();
            event('log', [[$this->module, 'u', ['before' => $before, 'after' => $after]]]);

            return $after;
        }
    }

    public function delete($id)
    {
        if (!$info = GallerySortModel::where('id', $id)->first()) {
            return ['errorCode' => 1313];
        }
        if (GalleryModel::where('sort_id', $id)->count()) {
            return ['errorCode' => 1314];
        }
        if (GallerySortModel::destroy($id)) {
            event('log', [[$this->module, 'd', $info]]);
        }
        if ($info->fid) {
            if (!GallerySortModel::where('fid', $info->fid)->count()) {
                $this->update($info->fid, ['is_last' => 1]);
            }
        }

        return $info->toArray();
    }
}