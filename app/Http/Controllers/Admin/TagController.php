<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\InterfacesBag\Tag;
use Illuminate\Support\Facades\Response;

class TagController extends Controller
{
    public $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function index(Request $request)
    {
        $fillable = [
            'name',
            'mark',
            'user_id',
            'order_by',
            'order',
            'per_page_num',
            'page',
        ];
        $resp = $this->tag->index($request->only($fillable));

        return Response::display($resp);
    }

    public function show($id)
    {
        $resp = $this->tag->show($id);

        return Response::display($resp);
    }

    public function store(Request $request)
    {
        $fillable = [
            'name',
            'count',
            'mark',
        ];
        $resp = $this->tag->create($request->only($fillable));

        return Response::display($resp);
    }

    public function update(Request $request, $id)
    {
        $fillable = [
            'name',
            'count',
            'mark',
        ];
        $resp = $this->tag->update($id, $request->only($fillable));

        return Response::display($resp);
    }

    public function destroy($id)
    {
        $resp = $this->tag->delete($id);

        return Response::display($resp);
    }
}
