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
        $data = array_filter($data);
        if (!isset($data['cid']) || !intval($data['cid'])) {
            return ['errorCode' => 1316];
        }
        if (!isset($data['cid']) || !in_array($data['type'], ['product', 'article', 'carousel-product', 'carousel-article'])) {
            return ['errorCode' => 1317];
        }
        $data['order'] = isset($data['order']) ? intval($data['order']) : 0;
        $data['user_id'] = Auth::id();
        if ($style = StyleModel::create($data)) {
            event('log', [[$this->module, 'c', $style]]);

            return $style;
        }
    }

    public function delete($id)
    {
        $style = StyleModel::where('id', $id)->first();
        if (!$style) {
            return ['errorCode' => 1315];
        }
        if (StyleModel::destroy($id)) {
            event('log', [[$this->module, 'd', $style]]);

            return $style->toArray();
        }
    }
}