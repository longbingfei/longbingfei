<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Repositories\InterfacesBag\Article;

class ArticleController extends Controller
{
    protected $article;

    public function __construct(Article $article)
    {
        $this->middleware('auth');
        $this->middleware('permission:article-list', ['only' => 'index']);
        $this->middleware('permission:article-add', ['only' => 'store']);
        $this->middleware('permission:article-edit', ['only' => 'update']);
        $this->middleware('permission:article-del', ['only' => 'destroy']);
        $this->article = $article;
    }

    public function index(Request $request)
    {
        $fileable = [
            'title',
            'sort_id',
            'user_id',
            'created_at',
            'updated_at',
            'per_page_num',
            'page',
            'order_by',
            'order',
            'tag_ids'
        ];
        $resp = $this->article->index($request->only($fileable));

        return view('admin.article', ['data' => $resp]);
    }

    public function show($id)
    {
        $resp = $this->article->show($id);

        return view('admin.article_detail', ['detail' => $resp]);
    }

    public function store(Request $request)
    {
        $rules = [
            'title.required'   => 1200,
            'title.max:50'     => 1201,
            'content.required' => 1202,
        ];
        if ($request->hasFile('file')) {
            $rules['file.image'] = 1104;
        }
        $fillable = [
            'title',
            'content',
            'sort_id',
            'status',
            'file',
            'tag_ids'
        ];
        if ($error_code = call_user_func(app('ValidatorForm'), $request, $rules)) {
            return Response::display(["error_code" => $error_code]);
        }
        $resp = $this->article->create($request->only($fillable));

        return Response::display($resp);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title.required'   => 1200,
            'title.max:50'     => 1201,
            'content.required' => 1202,
        ];
        if ($request->hasFile('file')) {
            $rules['file.image'] = 1104;
        }
        $fillable = [
            'title',
            'content',
            'sort_id',
            'file',
            'tag_ids'
        ];
        if ($error_code = call_user_func(app('ValidatorForm'), $request, $rules)) {
            return Response::display(["error_code" => $error_code]);
        }
        $resp = $this->article->update($id, $request->only($fillable));

        return Response::display($resp);
    }

    public function destroy($id)
    {
        $resp = $this->article->delete(intval($id));

        return Response::display($resp);
    }

    public function form($id = 0)
    {
        $params = [];
        if ($id) {
            $params['single_data'] = $this->article->show($id);
        }

        return view('admin.article_form', $params);
    }
}
