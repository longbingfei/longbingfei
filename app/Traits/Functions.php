<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 17/1/10
 * Time: 下午5:00
 */
namespace App\Traits;
Trait Functions
{
    //创建目录
    protected function checkDir($path, $show_path = false)
    {
        if (!is_dir($path)) {
            @mkdir($path, 0775, 1);
        }

        return is_dir($path) && is_writeable($path) ? ($show_path ? $path : true) : false;
    }

    //获取模型
    protected function getModel($module)
    {
        $model = array_reduce(explode('_', $module), function($x, $y) {
            return ucfirst($x) . ucfirst($y);
        });
        $model = 'App\Models\\' . $model;

        return class_exists($model) ? $model : false;
    }
}