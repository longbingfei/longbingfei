<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/6/13
 * Time: 下午3:04
 */
namespace App\Repositories\Eloquents;

use App\Models\Product;
use Auth;
use App\Models\Style as StyleModel;
use App\Models\Product as ProductModel;
use App\Models\Article as ArticleModel;
use App\Repositories\InterfacesBag\Style as StyleInterface;

class Style implements StyleInterface
{
    protected $module = "style";

    public function index()
    {
        $carousel = Product::where('is_carousel', 1)->get()->all();
    }
}