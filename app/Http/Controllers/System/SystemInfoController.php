<?php

namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SystemInfoController extends Controller
{
    private $cmd;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($info = null){

        return method_exists($this,$info) ? $this->$info() : [];
    }

    public function df(){
        $this->cmd = 'df -h';

        return $this->cmd();
    }

    public function php(){
        $this->cmd = 'ps aux|grep php-fpm';

        return $this->cmd();
    }

    public function nginx(){
        $this->cmd = 'ps aux|grep nginx';

        return $this->cmd();
    }

    public function cal(){
        $this->cmd = 'cal';

        return $this->cmd();
    }

    private function cmd(){
        @exec($this->cmd,$return);

        return $return;
    }
}
