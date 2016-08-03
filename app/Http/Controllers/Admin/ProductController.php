<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\InterfacesBag\Product;
class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product){
        $this->middleware('auth');
        $this->product = $product;
    }

    public function index(Request $request){
        $fillable=[
            'page',
            'perpage',
            'sort_id',
            'orderby',
            'storage',
            'price',
            'title',
            'order'
        ];
        return $this->product->index($request->only($fillable));
    }
    public function show($id){
        return $this->product->show($id);
    }
    public function store(Request $request){
        $keys = [
            'name',
            'describe',
            'price',
            'storage',
            'sort_id',
            'status',
            'images',
        ];
        $data = $request->all();
        $data = array_intersect_key($data,array_flip($keys));


        return $this->product->create($data);
    }
    public function update($id,Requests\ProductRequest $request){
        $keys = [
            'name',
            'describe',
            'price',
            'storage',
            'sort_id',
            'status',
            'images',
        ];
        $data = $request->all();
        $data = array_intersect_key($data,array_flip($keys));

        return $this->product->update($id,$data);
    }
    public function destroy($id){
        return $this->product->delete($id);
    }
}
