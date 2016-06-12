<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\InterfacesBag\Image;

class ImageController extends Controller
{
    protected $image;

    protected $types = ['jpg','png','gif','jpeg'];

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
        if(!$image = $request->file("image")){
            return '{"Error":"no image file"}';
        }
        if($image->getSize() == 0){
            return '{"Error":"invalid size"}';
        }
        if(!$type = $image->guessExtension()){
            return '{"Error":"invalid extension"}';
        }
        if(!in_array($type,$this->types)){
            return '{"Error":"invalid type"}';
        }
        $name = trim($request->get('name'));
        if($name){
            $image->name = $name;
        }
        $sort_id = intval($request->input('sort_id'));
        if($sort_id){
            $image->sort_id = $sort_id;
        }

        return $this->image->create($image);
    }

    public function destroy($id){
        return $this->image->delete($id);
    }
}
