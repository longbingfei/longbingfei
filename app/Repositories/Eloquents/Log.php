<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/11/9
 * Time: 上午10:28
 */
namespace App\Repositories\Eloquents;

use App\Traits\Functions;
use App\Models\Log as LogModel;
use Illuminate\Support\Facades\DB;
use App\Models\Recovery as RecoveryModel;
use App\Repositories\InterfacesBag\Log as LogInterfaceBag;
use App\Repositories\InterfacesBag\Image as ImageInterfaceBag;

class Log implements LogInterfaceBag
{
    use Functions;
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
        if (in_array($module, ['image'])) {
            return ['error_code' => 1800];
        }
        if (!in_array($action, ['update', 'delete'])) {
            return ['error_code' => 1801];
        }
        if (!$model = $this->getModel($module)) {
            return ['error_code' => 13083];
        }
        $info = json_decode($log->info, 1);
        switch ($action) {
            case 'update':
                if (!$last_info = $model::find($info['before']['id'])) {
                    return ['error_code' => 1802];
                }
                //对比还原点变动前的images和此条内容最新的images
                $before = (array)json_decode($info['before']['images'], 1);
                $last = (array)json_decode($last_info['images'], 1);
                if ($this->checkDiff('image', $before, $last)) {
                    $res = $this->handleFiles($before, $last);
                    if (isset($res['error_code'])) {
                        return $res;
                    }
                }

                if ($return = $model::where('id', $info['before']['id'])->update($info['before'])) {
                    event('log', [[$module, 't', ['before' => $last_info, 'after' => $info['before']]]]);
                }
                break;
            case 'delete':
                break;
            default:
                break;
        }
    }

    protected function handleFiles($before, $last)
    {
        $return = true;
        $drop = $keep = $recovery = [];
        //删除还原点之后新增的图片
        array_map(function($y) use (&$drop, &$keep, $before) {
            !in_array($y, $before) ? $drop[] = $y['id'] : $keep[] = array_search($y, $before);
        }, $last);
        if (!empty($drop)) {
            $return = $this->image->delete(implode(',', $drop));
        }
        //恢复还原点之后删除的图片
        if (!empty($keep)) {
            foreach ($before as $key => $vo) {
                if (!in_array($key, $keep)) {
                    $recovery[] = $vo['id'];
                }
            }
            if (!empty($recovery)) {
                return $this->doRecovery('image', $recovery);
            }
        }

        return $return;
    }

    protected function doRecovery($module, $ids)
    {
        if (!in_array($module, ['image', 'video', 'gallery'])) {
            return ['error_code' => 1805];
        }
        $recovery = RecoveryModel::where('type', $module)->whereIn('material_id', $ids)->get()->toArray();
        if (empty($recovery)) {

            return ['error_code' => 1804];
        }
        if (!$model = $this->getModel($module)) {
            return ['error_code' => 13083];
        }
        if ($model::whereIn('id', $ids)->count()) {
            return ['error_code' => 1806];
        }
        $data = [];
        array_map(function($y) use (&$data) {
            $data[] = json_decode($y['info'], 1);
        }, $recovery);

        return DB::table((new $model)->table)->insert($data);
    }

    protected function checkDiff($type, $A, $B, $check_key = false)
    {
        switch ($type) {
            case 'image':
                return true;
                break;
            default;
                break;
        }
    }
}