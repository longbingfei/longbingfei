<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Repositories\InterfacesBag\ProductSort;

class ProductSortController extends Controller
{
    protected $ps;

    public function __construct(ProductSort $ps)
    {
        $this->middleware('auth');
        $this->ps = $ps;
    }

    public function index(Request $request)
    {
        $fillable = [
            'fid'
        ];

        return $this->ps->index($request->only($fillable));
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
        $return = $this->ps->create($request->only($fillable));

        return $return;
    }

    public function update($id, Request $request)
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

        return $this->ps->update($id, $request->only($fillable));
    }

    public function destroy($id)
    {
        return $this->ps->delete($id);
    }
}
