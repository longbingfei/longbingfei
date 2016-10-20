<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/6/13
 * Time: 下午3:04
 */
namespace App\Repositories\Eloquents;

use Auth;
use App\Models\Product as ProductModel;
use App\Models\Article as ArticleModel;
use App\Repositories\InterfacesBag\Style as StyleInterface;

class Style implements StyleInterface
{
    protected $module = "style";

    public function index()
    {
        $carousel = ProductModel::where('is_carousel', 1)->get()->toArray();
        $promote = ProductModel::where('is_promote', 1)->get()->toArray();
        $article = ArticleModel::all()->toArray();
        $resp = [
            'carousel' => empty($carousel) ? [] : array_map(function($y) {
                $images = unserialize($y['images']);
                $y['image_path'] = $images ? current($images)['path'] : 'default/images/zz.png';

                return $y;
            }, $carousel),
            'promote'  => $promote,
            'article'  => $article
        ];

        return $resp;
    }

    public function update($id, array $data)
    {
        $data = array_filter($data, function($y) {
            return $y !== null;
        });
        if (!empty($data)) {
            $before = ProductModel::where('id', $id)->first();
            if (is_null($before)) {
                return ['errorCode' => 1300];
            }
            if (ProductModel::where('id', $id)->update($data)) {
                $after = ProductModel::where('id', $id)->first();
                event('log', [[$this->module, 'u', ['before' => $before, 'after' => $after]]]);

                return $after;
            }
        }
    }
}