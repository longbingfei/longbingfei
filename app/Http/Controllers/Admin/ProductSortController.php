<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\InterfacesBag\ProductSort;

class ProductSortController extends Controller
{
    protected $ps;

    public function __construct(ProductSort $ps)
    {
        $this->middleware('auth');
        $this->ps = $ps;
    }

    public function index()
    {
        return $this->ps->index();
    }

    public function store(Request $request)
    {
        return $this->ps->create($request->only(['fid', 'name']));
    }

    public function update($id, Request $request)
    {
        return $this->ps->update($id, $request->only('name'));
    }

    public function destroy($id)
    {
        return $this->ps->delete($id);
    }
}
