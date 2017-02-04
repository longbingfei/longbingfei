<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\InterfacesBag\Log;
use Illuminate\Support\Facades\Response;

class LogController extends Controller
{
    protected $log;

    public function __construct(Log $log)
    {
        $this->log = $log;
    }

    public function index(Request $request)
    {
        $fillable = [
            'user_id',
            'date',
            'module',
            'action',
            'per_page_num',
            'page'
        ];
        $resp = $this->log->index($request->only($fillable));
//        return $resp;

        return isset($resp['error_code']) ? Response::display($resp) : view('admin.log', ['data' => $resp]);
    }

    public function recovery($id)
    {
        $resp = $this->log->recovery($id);

        return Response::display($resp);
    }
}
