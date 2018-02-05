<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class WebController extends Controller
{
    public function index()
    {
        return view('tpl.default.index');
    }

    public function need()
    {
        return view('tpl.default.need');
    }

    public function needDetail()
    {
        return view('tpl.default.need_detail');
    }
}
