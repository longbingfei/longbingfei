<?php

namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Traits\Functions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SystemInfoController extends Controller
{
    use Functions;
    private $cmds = [
        'df'    => 'df -h',
        'php'   => 'ps aux|grep php-fpm',
        'nginx' => 'ps aux|grep nginx',
        'cal'   => 'cal'
    ];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:sys');
    }

    public function index($info = null)
    {

        $cmds = isset($this->cmds[$info]) ? $this->cmds[$info] : 'echo "invalid cmd line"';
        @exec($cmds, $return);

        return $return;
    }

    public function nginx(Request $request)
    {
        $fillable = [
            'port',
            'server_name',
            'root',
            'nginx_config_dir'
        ];

        $resp = $this->nginxConfig($request->only($fillable));

        return Response::display($resp);
    }
}
