<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/19
 * Time: 上午10:55
 */
namespace App\Events;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LogIntoDatabase{
    public function handle(array $payload = []){
        $Action = [
            'C' => '创建',
            'U' => '更新',
            'D' => '删除',
            'E' => '审核',
            'L' => '登录',
            'R' => '注册',
        ];
        $action = $Action[strtoupper($payload[1])];
        $content = json_encode($payload[2]);
        $data = [
            'date' => Carbon::now(),
            'module' => $payload[0],
            'action' => $action,
            'info' => $content,
            'status' => isset($payload[3]) ? (integer)$payload[3] : 1,
            'user_id' => Auth::id()
        ];
        DB::table('logs')->insert($data);
    }
}