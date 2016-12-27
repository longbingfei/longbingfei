<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\InterfacesBag\Publish;
use Illuminate\Support\Facades\Response;

class PublishController extends Controller
{
    protected $publish;

    public function __construct(Publish $publish)
    {
        $this->publish = $publish;
    }

    public function index(Request $request)
    {
        $fillable = [];
        $resp = $this->publish->index($request->only($fillable));

        return Response::display($resp);
    }

    public function store(Request $request)
    {
        $fillable = [];
        $resp = $this->publish->create($request->only($fillable));

        return Response::display($resp);
    }

    public function show($id)
    {
        $resp = $this->publish->show($id);

        return Response::display($resp);
    }

    public function update(Request $request, $id)
    {
        $fillable = [];
        $resp = $this->publish->update($id, $request->only($fillable));

        return Response::display($resp);
    }


    public function destroy($id)
    {
        $resp = $this->publish->delete($id);

        return Response::display($resp);
    }
}
