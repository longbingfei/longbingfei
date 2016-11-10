<?php

namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SystemInfoController extends Controller
{
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
}
