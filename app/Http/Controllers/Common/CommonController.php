<?php

namespace App\Http\Controllers\Common;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Response;

class CommonController extends Controller
{
    public function __construct()
    {
        //
    }

    public function getVerifyCode()
    {
        $number = str_random(5);
        session()->flash('verifycode', $number);
        $image = Image::canvas(90, 40, array(mt_rand(210, 255), mt_rand(210, 255), mt_rand(210, 255)))
            ->text($number, 0, 15, function($font) {
                $font->size(25);
                $font->file(public_path('font/AppleGothic.ttf'));
                $font->color('#ccc');
                $font->valign('center');
                $font->angle(mt_rand(- 8, 8));
            })
            ->line(mt_rand(0, 100), mt_rand(0, 40), mt_rand(0, 100), mt_rand(0, 40), function($draw) {
                $draw->color('#ccc');
            })
            ->line(mt_rand(0, 100), mt_rand(0, 40), mt_rand(0, 100), mt_rand(0, 40), function($draw) {
                $draw->color('#ccc');
            })
            ->line(mt_rand(0, 100), mt_rand(0, 40), mt_rand(0, 100), mt_rand(0, 40), function($draw) {
                $draw->color('#ccc');
            })
            ->line(mt_rand(0, 100), mt_rand(0, 40), mt_rand(0, 100), mt_rand(0, 40), function($draw) {
                $draw->color('#ccc');
            })
            ->response('jpg')->header('verifycode', $number);

        return $image;
    }

    public function downloadFile(Request $request)
    {
        $url = urldecode(trim($request->get('url')));
        if (!$urlinfo = $this->getUrlInfo($url)) {
            return Response::display(['errorCode' => 1400]);
        }
        $filename = last(explode('/', $url));
        $mode = stripos(PHP_OS, 'WIN') === 0 ? 'rb' : 'r';
        $handle = fopen($url, $mode);
        header('Content-Type:' . $urlinfo[2]);
        header('Accept-Range:bytes');
        header('Accept-Length:' . $urlinfo[3]);
        header('Content-Disposition:attachment;filename=' . $filename);
        $contents = '';
        while (!feof($handle)) {
            $contents .= fread($handle, 1024);
        }
        echo $contents;
        fclose($handle);
    }

    private function getUrlInfo($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        if (!$res) {
            return false;
        }
        $regex = '/HTTP\/1\.\d\s(\d{3})[\s\w:,-=\/\(\)]*?Content-Type:\s(\w+\/\w+)[\s\w:,-=\/\(\)]*?Content-Length:\s(\d+)/';
        preg_match($regex, $res, $match);

        return count($match) === 4 && $match[1] == 200 ? $match : false;
    }
}
