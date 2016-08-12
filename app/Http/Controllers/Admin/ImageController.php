<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\InterfacesBag\Image;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    protected $image;

    public function __construct(Image $image){
        $this->middleware('auth');
        $this->image = $image;
    }

    public function index(){
        return $this->image->index();
    }
    public function show($id){
        return $this->image->show($id);
    }
    public function store(Request $request){
        $rules = [
            'image.image'=>1104
        ];
        $fillable = [
            'name',
            'sort_id',
            'thumb_width',
            'path',
            'thumb_path'
        ];
        if($errorCode = call_user_func(app('ValidatorForm'),$request,$rules)){
            return Response::error($errorCode);
        }

        return $this->image->create($request->file('image'),$request->only($fillable));
    }

    public function destroy($id){
        return $this->image->delete($id);
    }
}
