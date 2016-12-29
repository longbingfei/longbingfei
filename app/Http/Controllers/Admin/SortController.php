<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Repositories\InterfacesBag\Sort;

class SortController extends Controller
{
    protected $gs;

    public function __construct(Request $request, Sort $gs)
    {
        $this->middleware('auth');
        $this->gs = $gs;
    }

    public function index(Request $request)
    {
        $fillable = [
            'fid'
        ];
        $resp = $this->gs->index($request->only($fillable));

        return Response::display($resp);
    }

    public function settings(Request $request)
    {
        return view('admin.' . strtolower($request->get('app')) . '_settings');
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
        $resp = $this->gs->create($request->only($fillable));

        return Response::display($resp);
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
        $resp = $this->gs->update($id, $request->only($fillable));

        return Response::display($resp);
    }

    public function destroy($id)
    {
        $resp = $this->gs->delete($id);

        return Response::display($resp);
    }
}
