<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/12/27
 * Time: 上午10:50
 */
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Repositories\InterfacesBag\Publish;

class PublishController extends Controller
{
    protected $publish;

    public function __construct(Publish $publish)
    {
        $this->publish = $publish;
    }

    public function index(Request $request)
    {
        $fillable = [
            'type',
            'keywords',
            'title',
            'weight',
            'page',
            'per_page_num'
        ];
        $resp = $this->publish->index($request->only($fillable));

        return Response::display($resp);
    }

    public function store(Request $request)
    {
        $fillable = [
            'content_id',
            'type',
            'tpl_id',
            'path'
        ];
        $resp = $this->publish->create($request->only($fillable));

        return Response::display($resp);
    }

    public function show($id)
    {
        $resp = $this->publish->show($id);

        return $resp;
    }

    public function update(Request $request, $id)
    {
        $fillable = [
            'weight',
            'tags',
        ];
        $resp = $this->publish->update($id, $request->only($fillable));

        return Response::display($resp);
    }


    public function destroy($id)
    {
        $resp = $this->publish->delete($id);

        return Response::display($resp);
    }
}
