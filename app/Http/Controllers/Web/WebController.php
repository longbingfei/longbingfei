<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Repositories\InterfacesBag\Style;
use App\Repositories\InterfacesBag\Article;
use App\Repositories\InterfacesBag\Product;

class WebController extends Controller
{
    protected $style;
    protected $article;
    protected $product;

    public function __construct(Style $style, Article $article, Product $product)
    {
        $this->article = $article;
        $this->product = $product;
        $this->style = $style;
    }

    public function index()
    {
        $style = $this->styleIndex();

        return view('web.homepage', ['style' => $style]);
    }

    public function styleIndex()
    {
        $resp = $this->style->index();

        return Response::display($resp);
    }

    public function articleIndex()
    {
        $resp = $this->article->index();

        return Response::display($resp);
    }

    public function articleShow($id)
    {
        $resp = $this->article->show($id);

        return Response::display($resp);
    }

    public function productIndex(Request $request)
    {
        $fillable = [
            'page',
            'perpage',
            'sort_id',
            'orderby',
            'storage',
            'price',
            'title',
            'order'
        ];

        $resp = $this->product->index($request->only($fillable));

        return Response::display($resp);
    }

    public function productShow($id)
    {
        $resp = $this->product->show($id);

        return Response::display($resp);
    }
}
