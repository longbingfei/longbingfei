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

class LogIntoDatabase
{
    public function handle(array $payload = [])
    {
        $Action = [
            'C' => 'create',
            'U' => 'update',
            'D' => 'delete',
            'T' => 'recovery',
            'L' => 'login',
            'R' => 'register',
        ];
        $action = $Action[strtoupper($payload[1])];
        $content = json_encode($payload[2]);
        $data = [
            'module'   => $payload[0],
            'action'   => $action,
            'info'     => $content,
            'status'   => isset($payload[3]) ? (integer)$payload[3] : 1,
            'user_id'  => Auth::id(),
            'username' => Auth::User()->username,
            'date'     => Carbon::now(),
        ];
        //插入日志
        DB::table('logs')->insert($data);
        //插入还原表
        if (isset($payload['recovery']) && $payload['recovery']) {
            $data = [
                'material_id' => $payload[2]['id'],
                'type'        => $payload[0],
                'info'        => $content,
                'user_id'     => Auth::id(),
                'created_at'  => Carbon::now()
            ];
            DB::table('recovery')->insert($data);
        }
    }
}