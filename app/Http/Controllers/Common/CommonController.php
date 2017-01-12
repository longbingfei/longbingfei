<?php

namespace App\Http\Controllers\Common;

use App\Http\Requests;
use App\Traits\Functions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class CommonController extends Controller
{
    use Functions;

    public function getVerifyCode()
    {
        return $this->makeVerifyCode();
    }

    public function downloadFile(Request $request)
    {
        $resp = $this->download($request->get('url'));

        return Response::display($resp);
    }
}
