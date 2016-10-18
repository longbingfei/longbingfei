<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/6/13
 * Time: 下午3:04
 */
namespace App\Repositories\Eloquents;

use Auth;
use App\Models\Style as StyleModel;
use App\Repositories\InterfacesBag\Style as StyleInterface;

class Style implements StyleInterface
{
    protected $module = "style";

    public function index()
    {
        $return = StyleModel::all()->groupBy('type')->toArray();

        return $return;
    }

    public function create(array $data)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}