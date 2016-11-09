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
        $logs = $logs->paginate($per_page_num, ['*'], 'page', $page)->toArray();

        return $logs;
    }
}