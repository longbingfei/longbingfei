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
        $fillable = [
            'fid'
        ];
        $resp = $this->as->index($request->only($fillable));

        return Response::display($resp);
    }

    public function store(Request $request)
    {
        $rules = [
            'name.required' => 1308,
            'fid.min:0'     => 1309,
            'fid.integer'   => 1310,
        ];
        $fillable = [
            'name',
            'fid'
        ];
        if ($errorCode = call_user_func(app('ValidatorForm'), $request, $rules)) {
            return Response::display(['errorCode' => $errorCode]);
        }
        $resp = $this->as->create($request->only($fillable));

        return Response::display($resp);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name.required' => 1308,
        ];
        $fillable = [
            'name',
        ];
        if ($errorCode = call_user_func(app('ValidatorForm'), $request, $rules)) {
            return Response::display(['errorCode' => $errorCode]);
        }
        $resp = $this->as->update($id, $request->only($fillable));

        return Response::display($resp);
    }

    public function destroy($id)
    {
        $resp = $this->as->delete($id);

        return Response::display($resp);
    }
}
