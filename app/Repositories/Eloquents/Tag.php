<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 17/1/12
 * Time: 上午9:28
 */
namespace App\Repositories\Eloquents;

use App\Traits\Functions;
use App\Models\Tag as TagModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\InterfacesBag\Tag as TagInterface;

class Tag implements TagInterface
{
    use Functions;
    protected $module = 'tag';

    public function index(array $condition)
    {
        $tags = TagModel::where('tags.id', '>', 0);
        if ($user_id = intval($condition['user_id'])) {
            $tags = $tags->where('tags.user_id', $user_id);
        }
        if ($name = trim($condition['name'])) {
            $tags = $tags->where('tags.name', 'like', '%' . $name . '%');
        }
        if ($mark = trim($condition['mark'])) {
            $tags = $tags->where('tags.mark', 'like', '%' . $mark . '%');
        }
        $tags = $tags
            ->leftJoin('administrators', 'tags.user_id', '=', 'administrators.id')
            ->select(
                'tags.*',
                'administrators.username as username'
            );
        $orderBy = trim($condition['order_by']) ? trim($condition['order_by']) : 'id';
        $order = strtoupper(trim($condition['order'])) === 'ASC' ? 'ASC' : 'DESC';
        $tags = $tags->orderBy('tags.' . $orderBy, $order);
        $per_page_num = intval($condition['per_page_num']) ? intval($condition['per_page_num']) : 15;
        $page = intval($condition['page']) ? intval($condition['page']) : 0;
        $tags = $tags->paginate($per_page_num, ['*'], 'page', $page)->toArray();

        return $tags;
    }

    public function show($id)
    {
        if (!$tags = TagModel::where('id', $id)->first()) {
            return ["error_code" => 1900];
        }
        $tags = TagModel::where('tags.id', $id)
            ->leftJoin('administrators', 'tags.user_id', '=', 'administrators.id')
            ->select(
                'tags.*',
                'administrators.username as username'
            );

        return $tags->first()->toArray();
    }

    public function create(array $data)
    {
        $data['user_id'] = Auth::id();
        if (!$data['name'] = trim($data['name'])) {
            return ["error_code" => 1901];
        }
        if (TagModel::where('name', $data['name'])->count()) {
            return ["error_code" => 1902];
        }
        $data['mark'] = trim($data['mark']) ? : '';
        $data['count'] = intval($data['count']);
        if ($tag = TagModel::create($data)) {
            event('log', [[$this->module, 'c', $tag]]);

            return $tag;
        }

        return ["error_code" => 1903];
    }

    public function update($id, array $data)
    {
        $data = array_filter($data, 'strlen');
        if (!$before = TagModel::where('id', $id)->first()) {
            return ["error_code" => 1900];
        }
        if (isset($data['name'])) {
            if (!$data['name'] = trim($data['name'])) {
                return ["error_code" => 1901];
            }
            if (TagModel::where('name', $data['name'])->where('id', '<>', $id)->count()) {
                return ["error_code" => 1902];
            }
        }
        if (isset($data['mark'])) {
            $data['mark'] = trim($data['mark']);
        }
        if (isset($data['count'])) {
            $data['count'] = intval($data['count']);
        }
        $compare = $before->toArray();
        unset($compare['updated_at'], $compare['created_at'], $compare['user_id'], $compare['id']);
        if ($this->arrayCompare($compare, $data)) {
            return ['error_code' => 1406];
        }
        $data['user_id'] = Auth::id();
        if (!TagModel::where('id', $id)->update($data)) {
            return ["error_code" => 1904];
        }
        $after = TagModel::where('id', $id)->first();
        event('log', [[$this->module, 'u', ['before' => $before, 'after' => $after]]]);

        return $after;
    }

    public function delete($id)
    {
        if (!$info = TagModel::where('id', $id)->first()) {
            return ["error_code" => 1900];
        }
        if ($info->count) {
            return ["error_code" => 1905];
        }
        if (TagModel::destroy($id)) {
            event('log', [[$this->module, 'd', $info]]);

            return $info->toArray();
        }

        return ["error_code" => 1906];
    }

    public function filterTagByIds($ids, $model = false)
    {
        $ids = is_array($ids) ? $ids : explode(',', $ids);
        $tags = TagModel::whereIn('id', $ids)->select(DB::raw("GROUP_CONCAT(id) as ids"))->first();

        return $tags->ids ? ($model ? explode(',', $tags->ids) : $tags->ids) : 0;
    }

    public function changeTagCount($ids)
    {
        $before = isset($ids['before']) ? $this->filterTagByIds($ids['before'], true) : [];
        $after = isset($ids['after']) ? $this->filterTagByIds($ids['after'], true) : [];
        $plus = array_diff($after, $before);
        $reduce = array_diff($before, $after);
        if (!empty($plus)) {
            TagModel::whereIn('id', array_values($plus))->update(['count' => DB::raw('count+1')]);
        }
        if (!empty($reduce)) {
            TagModel::whereIn('id', array_values($reduce))->update(['count' => DB::raw('count-1')]);
        }
    }
}