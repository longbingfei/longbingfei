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
        $data = [
            'index' => true
        ];
        return view('tpl.default.index', $data);
    }

    public function need()
    {
        return view('tpl.default.need');
    }

    public function needDetail($id)
    {
        return view('tpl.default.need_detail');
    }

    public function company()
    {
        return view('tpl.default.company');
    }

    public function companyDetail($id)
    {
        return view('tpl.default.company_detail');
    }

    public function product()
    {
        return view('tpl.default.product');
    }

    public function productDetail($id)
    {
        return view('tpl.default.product_detail');
    }

    public function zone($id)
    {
        return view('tpl.default.zone');
    }
}
