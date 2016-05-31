<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\InterfacesBag\Media;

class MediaController extends Controller
{
    protected $media;

    protected $types = [
        'image'=>['jpg','png','gif','jpeg'],
        'video'=>['mp4'],
        'audio'=>['mp3','wma'],
    ];

    public function __construct(Media $media){
        $this->middleware('auth');
        $this->media = $media;
    }

    public function index(Request $request){
        return $this->media->index();
    }
    public function show($id){
        return $this->media->show($id);
    }

    public function store(Request $request){

        if(!$file = $request->file('file')){
            return '{"Error":"no file"}';
        }
        //php.ini中upload_max_filesize需手动配置.以及max_post_size
        if($file->getSize() == 0){
            return '{"Error":"invalid size"}';
        }
        if(!$type = $file->guessExtension()){
            return '{"Error":"invalid type"}';
        }
        if(!$sort = $this->getMediaSort($type)){
            return '{"Error":"invalid sort"}';
        }
        $file->title = trim($request->get('title')) ? trim($request->get('title')) : "新建".strtoupper($type)."文件";
        $file->sort = $sort;

        return $this->media->create($file);
    }

    protected function getMediaSort($type){
        foreach($this->types as $k => $v){
            if(in_array(strtolower($type),$v)){
                return $k;
            }
        }

        return false;
    }

    public function update(){
        return [];
    }

    public function destroy($id){
        return $this->media->delete($id);
    }
}
