<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/12/29
 * Time: 上午11:22
 */
namespace App\Repositories\Eloquents;

use Auth;
use App\Repositories\InterfacesBag\Sort as SortInterface;

class Sort implements SortInterface
{
    public $module;
    public $app_model;

    public function __construct($module)
    {
        $this->module = $module ? $module . '_sort' : null;
        $this->app_model = ucfirst($module);
    }

    public function index(array $condition = [])
    {
        $sort_model = 'App\Models\\' . $this->app_model . 'Sort';
        if (!class_exists($sort_model)) {
            return ['error_code' => 13082];
        }
        $condition = array_filter($condition);
        $sort = $sort_model::where('id', '>', 0);
        $fid = isset($condition['fid']) ? intval($condition['fid']) : 0;
        $sort = $sort->where('fid', $fid);

        return $sort->count() ? $sort->get()->toArray() : [];
    }

    public function create(array $data)
    {
        $sort_model = 'App\Models\\' . $this->app_model . 'Sort';
        if (!class_exists($sort_model)) {
            return ['error_code' => 13082];
        }
        $data['user_id'] = Auth::id();
        $data['fid'] = isset($data['fid']) ? intval($data['fid']) : 0;
        $father = $sort_model::where('id', $data['fid'])->first();
        if ($data['fid'] && !$father) {
            return ['error_code' => 1312];
        }
        if ($sort_model::where('fid', $data['fid'])->where('name', $data['name'])->count()) {
            event('log', [[$this->module, 'c', 'sort_already_exist', 0]]);

            return ['error_code' => 1311];
        }
        $data['is_last'] = 1;
        $newSort = $sort_model::create($data)->toArray();
        event('log', [[$this->module, 'c', $newSort]]);
        if ($father && $father->is_last) {
            $this->update($father->id, ['is_last' => 0]);
        }

        return $newSort;
    }

    public function update($id, array $data)
    {
        $sort_model = 'App\Models\\' . $this->app_model . 'Sort';
        if (!class_exists($sort_model)) {
            return ['error_code' => 13082];
        }
        $data['user_id'] = Auth::id();
        if (!$before = $sort_model::where('id', $id)->first()) {
            return ['error_code' => 1313];
        }
        if (isset($data['name']) && $sort_model::where('fid', $before->fid)->where('name', $data['name'])->count()) {
            event('log', [[$this->module, 'u', 'sort_already_exist', 0]]);

            return ['error_code' => 1311];
        }
        if ($sort_model::where('id', $id)->update($data)) {
            $after = $sort_model::where('id', $id)->first()->toArray();
            event('log', [[$this->module, 'u', ['before' => $before, 'after' => $after]]]);

            return $after;
        }
    }

    public function delete($id)
    {
        $sort_model = 'App\Models\\' . $this->app_model . 'Sort';
        if (!class_exists($sort_model)) {
            return ['error_code' => 13082];
        }
        if (!$info = $sort_model::where('id', $id)->first()) {
            return ['error_code' => 1313];
        }
        $app_model = 'App\Models\\' . $this->app_model;
        if (!class_exists($app_model)) {
            return ['error_code' => 13083];
        }
        if ($app_model::where('sort_id', $id)->count()) {
            return ['error_code' => 1314];
        }
        if ($sort_model::destroy($id)) {
            event('log', [[$this->module, 'd', $info]]);
        }
        if ($info->fid) {
            if (!$sort_model::where('fid', $info->fid)->count()) {
                $this->update($info->fid, ['is_last' => 1]);
            }
        }

        return $info->toArray();
    }
}