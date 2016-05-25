<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\InterfacesBag\Media;
use App\Repositories\InterfacesBag\Article;
use App\Repositories\InterfacesBag\Product;

class WebController extends Controller
{
    protected $media;
    protected $article;
    protected $product;

    public function __construct(Media $media,Article $article,Product $product){
        $this->media = $media;
        $this->article = $article;
        $this->product = $product;
    }

    public function articleIndex(){
        return $this->article->index();
    }

    public function articleShow($id){
        return $this->article->show($id);
    }

    public function mediaShow($id){
        return $this->media->show($id);
    }

    public function productIndex(){
        return $this->product->index();
    }

    public function productShow($id){
        return $this->product->show($id);
    }
}
