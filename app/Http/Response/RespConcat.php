<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/17
 * Time: 下午1:08
 */
namespace App\Http\Response;
interface RespConcat{
    public function __construct();

    public function code();

    public function msg();

    public function out();
}