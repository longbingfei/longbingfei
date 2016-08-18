<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\InterfacesBag\ArticleSort;

class ArticleSortController extends Controller
{
    protected $as;

    public function __construct(ArticleSort $as)
    {
        $this->middleware('auth');
        $this->as = $as;
    }

    /**
     * @params page int
     * @params per_page_num int
     */
    public function index()
    {
        return $this->as->index();
    }

    public function store(Request $request)
    {
        return $this->as->create($request->only(['fid', 'name']));
    }

    public function update(Request $request, $id)
    {
        return $this->as->update($id, $request->only('name'));
    }

    public function destroy($id)
    {
        return $this->as->delete($id);
    }
}
