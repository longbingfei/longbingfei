<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/17
 * Time: 下午1:07
 */
namespace App\Http\Response;
class Resping implements RespConcat{
    public function __construct(){}

    public function code(){}

    public function msg(){}

    public function out(){
        return 123;
    }
}