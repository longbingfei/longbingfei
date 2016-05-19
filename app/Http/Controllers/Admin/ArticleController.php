<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\InterfacesBag\Article;

class ArticleController extends Controller
{
    protected $article;

    public function __construct(Article $article)
    {
        $this->middleware('auth');
        $this->article = $article;
    }

    public function index(){
        return $this->article->index();
    }

    public function show($id){
        return $this->article->show($id);
    }

    public function store(Request $request){
        $keys = [
            'title',
            'content',
            'status',
            'sort_id',
            'status',
        ];
        $data = $request->all();
        $data = array_intersect_key($data,array_flip($keys));

        return $this->article->create($data);
    }

    public function update($id,Requests\ArticleRequest $request){
        $keys = [
            'title',
            'content',
            'status',
            'sort_id',
            'status',
        ];
        $data = $request->all();
        $data = array_intersect_key($data,array_flip($keys));

        return $this->article->update($id,$data);
    }
}
