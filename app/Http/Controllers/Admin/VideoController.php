<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\InterfacesBag\Video;

class VideoController extends Controller
{
    protected $video;

    protected $types = ['mp4'];

    public function __construct(Video $video)
    {
        $this->middleware('auth');
        $this->video = $video;
    }

    public function index(){
        return $this->video->index();
    }
    public function show($id){
        return $this->video->show($id);
    }
    public function store(Request $request){
        if(!$video = $request->file("video")){
            return '{"Error":"no video file"}';
        }
        if($video->getSize() == 0){
            return '{"Error":"invalid size"}';
        }
        if(!$type = $video->guessExtension()){
            return '{"Error":"invalid extension"}';
        }
        if(!in_array($type,$this->types)){
            return '{"Error":"invalid type"}';
        }
        $name = trim($request->get('name'));
        if($name){
            $video->name = $name;
        }
        $sort_id = intval($request->input('sort_id'));
        if($sort_id){
            $video->sort_id = $sort_id;
        }

        return $this->video->create($video);
    }

    public function destroy($id){
        return $this->video->delete($id);
    }

}
