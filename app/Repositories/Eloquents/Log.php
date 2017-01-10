<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/11/9
 * Time: 上午10:28
 */
namespace App\Repositories\Eloquents;

use App\Models\Log as LogModel;
use App\Repositories\InterfacesBag\Log as LogInterfaceBag;
use App\Repositories\InterfacesBag\Image as ImageInterfaceBag;

class Log implements LogInterfaceBag
{
    protected $module = 'log';
    protected $image;

    public function __construct(ImageInterfaceBag $image)
    {
        $this->image = $image;
    }

    public function index(array $condition)
    {
        $logs = LogModel::where('user_id', '>', 0);
        if ($user_id = intval($condition['user_id'])) {
            $logs = $logs->where('user_id', $user_id);
        }
        if ($date = trim($condition['date'])) {
            $logs = $logs->where('date', $date);
        }
        if ($module = trim($condition['module'])) {
            $logs = $logs->where('module', $module);
        }
        if ($action = trim($condition['action'])) {
            $logs = $logs->where('action', $action);
        }
        $per_page_num = intval($condition['per_page_num']) ? intval($condition['per_page_num']) : 15;
        $page = intval($condition['page']) ? intval($condition['page']) : 0;
        $logs = $logs->orderby('date', 'desc')->paginate($per_page_num, ['*'], 'page', $page)->toArray();
        $logs['data'] = array_map(function($y) {
            $y['info'] = json_decode($y['info'], 1);
            if (isset($y['info']['index_pic'])) {
                $y['info']['index_pic'] = json_decode($y['info']['index_pic'], 1);
            }
            if (isset($y['info']['before']['index_pic'])) {
                $y['info']['before']['index_pic'] = json_decode($y['info']['before']['index_pic'], 1);
            }
            if (isset($y['info']['after']['index_pic'])) {
                $y['info']['after']['index_pic'] = json_decode($y['info']['after']['index_pic'], 1);
            }
            if (isset($y['info']['images'])) {
                $y['info']['images'] = json_decode($y['info']['images'], 1);
            }
            if (isset($y['info']['before']['images'])) {
                $y['info']['before']['images'] = json_decode($y['info']['before']['images'], 1);
            }
            if (isset($y['info']['after']['images'])) {
                $y['info']['after']['images'] = json_decode($y['info']['after']['images'], 1);
            }

            return $y;
        }, $logs['data']);

        return $logs;
    }

    public function recovery($id)
    {
        if (!$log = LogModel::find($id)) {
            return ['error_code' => 1803];
        }
        $module = $log->module;
        $action = $log->action;
        if (in_array($action, ['image'])) {
            return ['error_code' => 1800];
        }
        if (!in_array($action, ['update', 'delete'])) {
            return ['error_code' => 1801];
        }
        $model = array_reduce(explode('_', $module), function($x, $y) {
            return ucfirst($x) . ucfirst($y);
        });
        $model = 'App\Models\\' . $model;
        if (!class_exists($model)) {
            return ['error_code' => 13083];
        }
        $info = json_decode($log->info, 1);
        switch ($action) {
            case 'update':
                if (!$last_info = $model::find($info['before']['id'])) {
                    return ['error_code' => 1802];
                }
                //对比还原点变动前的images和此条内容最新的images
                $this->handleFiles($info['before']['images'], $last_info['images']);
                $model::where('id', $info['before']['id'])->update($info['before']);
                break;
            case 'delete':
                break;
            default:
                break;
        }
    }

    protected function handleFiles($that, $last)
    {
        $drop = $keep = [];
        $that = (array)json_decode($that, 1);
        $last = (array)json_decode($last, 1);
        //删除还原点之后新增的图片
        array_map(function($y) use (&$drop, &$keep, $that) {
            !in_array($y, $that) ? $drop[] = $y['id'] : $keep[] = array_search($y, $that);
        }, $last);
        if (!empty($drop)) {
            $this->image->delete(implode(',', $drop));
        }
//        if (!empty($keep)) {
//            array_map(function($y) use ($keep, $that) {
//                if (!in_array($y, $keep)) {
//                    return $this->doRecovery('image', [$that[$y]['path'], $that[$y]['thumb']]);
//                }
//            }, array_keys($that));
//        }
        //恢复还原点之后删除的图片
    }
}