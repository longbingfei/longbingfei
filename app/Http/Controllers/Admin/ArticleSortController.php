<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Repositories\InterfacesBag\ArticleSort;

class ArticleSortController extends Controller
{
    protected $as;

    public function __construct(ArticleSort $as)
    {
        $this->middleware('auth');
        $this->as = $as;
    }

    public function index(Request $request)
    {
        $return = $this->as->index($request->get('fid'));

        return Response::display($return);
    }

    public function store(Request $request)
    {
        $return = $this->as->create($request->only(['fid', 'name']));

        return Response::display($return);
    }

    public function update(Request $request, $id)
    {
        $return = $this->as->update($id, $request->get('name'));

        return Response::display($return);
    }

    public function destroy($id)
    {
        $return = $this->as->delete($id);

        return Response::display($return);
    }
}
