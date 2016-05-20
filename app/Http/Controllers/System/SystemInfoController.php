<?php

namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SystemInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($info = null){

        return method_exists($this,$info) ? $this->$info() : [];
    }

    public function df(){
        @exec('df -h',$return);

        return $return;
    }

    public function php(){
        @exec('ps aux|grep php-fpm',$return);

        return $return;
    }

    public function nginx(){
        @exec('ps aux|grep nginx',$return);

        return $return;
    }

    public function cal(){
        @exec('cal',$return);

        return $return;
    }
}
