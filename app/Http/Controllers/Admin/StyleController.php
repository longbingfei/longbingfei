<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Repositories\InterfacesBag\Style;

class StyleController extends Controller
{
    protected $style;

    public function __construct(Style $style)
    {
        $this->middleware('auth');
        $this->middleware('permission:sys');
        $this->style = $style;
    }

    public function index()
    {
        $resp = $this->style->index();

        return view('admin.style', ['detail' => $resp]);
    }

    public function update(Request $request, $id)
    {
        $fillable = [
            'is_promote',
            'is_carousel'
        ];
        $resp = $this->style->update($id, $request->only($fillable));

        return Response::display($resp);
    }
}
