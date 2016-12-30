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

class Log implements LogInterfaceBag
{
    protected $module = 'log';

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
}