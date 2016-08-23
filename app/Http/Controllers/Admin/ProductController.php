<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Repositories\InterfacesBag\Product;
use App\Repositories\InterfacesBag\ProductSort;

class ProductController extends Controller
{
    protected $product;

    protected $product_sort;

    public function __construct(Product $product, ProductSort $product_sort)
    {
        $this->middleware('auth');
        $this->product = $product;
        $this->product_sort = $product_sort;
    }

    public function index(Request $request)
    {
        $fillable = [
            'page',
            'perpage',
            'sort_id',
            'orderby',
            'storage',
            'price',
            'title',
            'order'
        ];
        $return = $this->product->index($request->only($fillable));

        return view('admin.product', ['data' => $return]);
    }

    public function show($id)
    {
        $resp = $this->product->show($id);

        return Response::display($resp);
    }

    public function form($id = 0)
    {
        $sort = $this->product_sort->index();
        $params = ['product_sort' => $sort];
        if ($id) {
            $params['single_data'] = $this->product->show($id);
        }

        return view('admin.product_form', $params);
    }

    public function store(Request $request)
    {
        $rules = [
            'name.required'  => 1301,
            'name.max:50'    => 1302,
            'price.required' => 1303,
            'price.float'    => 1304,
            'file.required'  => 1102,
        ];
        if (is_array($request->file('file'))) {
            $rules['file.images'] = 1106;
        } else {
            $rules['file.image'] = 1106;
        }
        $fillable = [
            'name',
            'describe',
            'price',
            'storage',
            'sort_id',
            'status',
            'file',
            'evaluate'
        ];
        if ($errorCode = call_user_func(app('ValidatorForm'), $request, $rules)) {
            return Response::display(['errorCode' => $errorCode]);
        }

        return $this->product->create($request->only($fillable));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name.required'  => 1301,
            'name.max:50'    => 1302,
            'price.required' => 1303,
            'price.float'    => 1304,
        ];
        if ($request->hasFile('file')) {
            if (is_array($request->file('file'))) {
                $rules['file.images'] = 1106;
            } else {
                $rules['file.image'] = 1106;
            }
        }
        $fillable = [
            'name',
            'describe',
            'price',
            'storage',
            'sort_id',
            'status',
            'drop_images',
            'file',
            'evaluate'
        ];
        if ($errorCode = call_user_func(app('ValidatorForm'), $request, $rules)) {
            return Response::display(['errorCode' => $errorCode]);
        }

        return $this->product->update($id, $request->only($fillable));
    }

    public function destroy($id)
    {
        return $this->product->delete($id);
    }
}
