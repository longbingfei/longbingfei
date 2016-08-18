<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\InterfacesBag\Style;

class StyleController extends Controller
{
    protected $style;

    public function __construct(Style $style)
    {
        $this->middleware('auth');
        $this->style = $style;
    }

    public function index()
    {
        return $this->style->index();
    }

    public function show($id)
    {
        return $this->style->show($id);
    }

    public function store(Request $request)
    {
        $fillable = [
            'type',
            'describe',
            'link',
            'image_path'
        ];
        $data = array_intersect_key($request->all(), array_flip($fillable));

        return $this->style->create($data);
    }

    public function update(Request $request, $id)
    {
        $fillable = [
            'describe',
            'link',
            'image_path',
            'status'
        ];
        $data = array_intersect_key($request->all(), array_flip($fillable));

        return $this->style->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->style->delete($id);
    }
}
