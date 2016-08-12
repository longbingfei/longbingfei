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
        //
    }

    public function show($id){
        $resp = $this->image->show($id);

        return Response::display($resp);
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
            return Response::display(['errorCode'=>$errorCode]);
        }
        $resp = $this->image->create($request->file('image'),$request->only($fillable));

        return Response::display($resp);
    }

    public function destroy($id){
        $resp = $this->image->delete($id);

        return Response::display($resp);
    }
}
