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
        $actions = ['login' => '登录', 'register' => '注册', 'create' => '新建', 'update' => '修改', 'delete' => '删除', 'recovery' => '还原'];
        $modules = ['auth' => '用户', 'article' => '文稿', 'product' => '商品', 'gallery' => '相册', 'image' => '图片', 'sort' => '分类'];
        $logs['data'] = array_map(function($y) use ($actions, $modules) {
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
            switch ($y['module']) {
                case 'auth':
                    $content = $y['info']['username'];
                    break;
                case 'article':
                    $content = isset($y['info']['title']) ? $y['info']['title'] : (isset($y['info']['before']) ?
                        $y['info']['before']['title'] : '无内容');
                    break;
                case 'product':
                    $content = isset($y['info']['name']) ? $y['info']['name'] : (isset($y['info']['before']) ?
                        $y['info']['before']['name'] : '无内容');
                    break;
                case 'image':
                    $content = $y['info']['name'];
                    break;
                case 'gallery':
                    $content = isset($y['info']['title']) ? $y['info']['title'] : (isset($y['info']['before']) ?
                        $y['info']['before']['title'] : '无内容');
                    break;
                default;
                    $content = isset($y['info']['name']) ? $y['info']['name'] : (isset($y['info']['before']['name']) ?
                        $y['info']['before']['name'] : '');
                    if (!$content) {
                        isset($y['info']['title']) ? $y['info']['title'] : (isset($y['info']['before']['title']) ?
                            $y['info']['before']['title'] : '');
                    }
            }
            $y['module_name'] = strpos($y['module'], '_sort') ? $modules[strstr($y['module'], '_sort', true)] . '分类' :
                $modules[$y['module']];
            $y['action_name'] = $actions[$y['action']];
            $y['content'] = $content;

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
        if (!in_array($action, ['update', 'delete', 'recovery'])) {
            return ['error_code' => 1801];
        }
        if (!$model = $this->getModel($module)) {
            return ['error_code' => 13083];
        }
        $info = json_decode($log->info, 1);
        switch ($action) {
            case 'update':
            case 'recovery':
                if (!$last_info = $model::find($info['before']['id'])) {
                    return ['error_code' => 1802];
                }
                //对比还原点变动前的image和此条内容最新的image
                switch ($module) {
                    case 'article':
                        $before = (array)json_decode($info['before']['index_pic'], 1);
                        if (!empty($before)) {
                            $before = [$before];
                        }
                        $last = (array)json_decode($last_info['index_pic'], 1);
                        if (!empty($last)) {
                            $last = [$last];
                        }
                        break;
                    case 'product':
                        $before = (array)json_decode($info['before']['images'], 1);
                        $last = (array)json_decode($last_info['images'], 1);
                        break;
                    default;
                        return ['error_code' => 1807];
                        break;
                }
                if (!$this->arrayCompare($before, $last)) {
                    $res = $this->handleFiles($before, $last);
                    if (isset($res['error_code'])) {
                        return $res;
                    }
                }
                if ($return = $model::where('id', $info['before']['id'])->update($info['before'])) {
                    event('log', [[$module, 't', ['before' => $last_info, 'after' => $info['before']]]]);
                }
                $id = $info['before']['id'];
                break;
            case 'delete':
                switch ($module) {
                    case 'article':
                        $before = (array)json_decode($info['index_pic'], 1);
                        if (!empty($before)) {
                            $before = [$before];
                        }
                        break;
                    case 'product':
                        $before = (array)json_decode($info['images'], 1);
                        break;
                    default;
                        return ['error_code' => 1807];
                        break;
                }
                $res = $this->handleFiles($before, []);
                if (isset($res['error_code'])) {
                    return $res;
                }
                if ($return = DB::table((new $model)->table)->insert($info)) {
                    event('log', [[$module, 't', $info]]);
                }
                $id = $info['id'];
                break;
            default:
                return ['error_code' => 1801];
                break;
        }

        return $model::find($id);
    }

    protected function handleFiles($before, $last)
    {
        $drop = $keep = $recovery = [];
        //删除还原点之后新增的图片
        array_map(function($y) use (&$drop, &$keep, $before) {
            !in_array($y, $before) ? $drop[] = $y['id'] : $keep[] = array_search($y, $before);
        }, $last);
        if (!empty($drop)) {
            $this->image->delete(implode(',', $drop));
        }
        //恢复还原点之后删除的图片
        foreach ($before as $key => $vo) {
            if (!in_array($key, $keep)) {
                $recovery[] = $vo['id'];
            }
        }
        if (!empty($recovery)) {
            return $this->doRecovery('image', $recovery);
        }

        return true;
    }

    protected function doRecovery($module, $ids)
    {
        if (!in_array($module, ['image', 'video'])) {
            return ['error_code' => 1805];
        }
        $query = RecoveryModel::where('type', $module)->whereIn('material_id', $ids);
        $recovery = $query->get()->toArray();
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
        if (DB::table((new $model)->table)->insert($data)) {
            return $query->delete();
        }
    }
}