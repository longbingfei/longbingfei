<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Repositories\InterfacesBag\Video;

class VideoController extends Controller
{
    protected $video;

    protected $types = ['mp4','avi'];

    public function __construct(Video $video)
    {
        $this->middleware('auth');
        $this->video = $video;
    }

    public function index()
    {
        $resp = $this->video->index();

        return Response::display($resp);
    }

    public function show($id)
    {
        $resp = $this->video->show($id);

        return Response::display($resp);
    }

    public function store(Request $request)
    {
        if (!$video = $request->file("video")) {
            return Response::display(['errorCode' => 1505]);
        }
        if ($video->getSize() == 0) {
            return Response::display(['errorCode' => 1506]);
        }
        if (!($type = $video->guessExtension()) || !in_array($video->guessExtension(), $this->types)) {
            return Response::display(['errorCode' => 1507]);
        }
        $name = trim($request->get('name'));
        if ($name) {
            $video->name = $name;
        }
        $sort_id = intval($request->input('sort_id'));
        if ($sort_id) {
            $video->sort_id = $sort_id;
        }
        $resp = $this->video->create($video);

        return Response::display($resp);
    }

    public function destroy($id)
    {
        $resp = $this->video->delete($id);

        return Response::display($resp);
    }

}
