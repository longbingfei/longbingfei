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
        $carousel = ProductModel::where('is_carousel', 1)->get()->all();
        $promote = ProductModel::where('is_promote', 1)->get()->all();
        $article = ArticleModel::all();

        $resp = [
            'carousel' => empty($carousel) ? [] : array_map(function($y) {
                $images = unserialize($y['image']);
                $y['image_path'] = $images ? $images[0]['path'] : 'default/images/404.png';

                return $y;
            }, $carousel),
            'promote'  => $promote,
            'article'  => $article
        ];

        return $resp;
    }
}