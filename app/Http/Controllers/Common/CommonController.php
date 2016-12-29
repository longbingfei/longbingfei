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
        $urlinfo = $this->getUrlInfo($url);
        if ($urlinfo['st'] != 200) {
            switch($urlinfo['st']){
                case 302:
                    $error_code = 1401;
                    break;
                case 401:
                    $error_code = 1402;
                    break;
                case 403:
                    $error_code = 1403;
                    break;
                case 500:
                    $error_code = 1404;
                    break;
            }
            return Response::display(['error_code' => $error_code]);
        }
        $filename = last(explode('/', $url));
        $mode = stripos(PHP_OS, 'WIN') === 0 ? 'rb' : 'r';
        $handle = @fopen($url, $mode);
        if (!$handle) {
            return Response::display(['error_code' => 1405]);
        }
        header('Content-Type:' . $urlinfo['ct']);
        header('Accept-Range:bytes');
        header('Accept-Length:' . $urlinfo['cl']);
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
        $regex_st = '/HTTP\/1\.\d\s(\d{3})/';
        $regex_ct = '/Content-Type:\s(\w+\/[\w-]*)/';
        $regex_cl = '/Content-Length:\s(\d+)/';
        preg_match($regex_st, $res, $match_st);
        preg_match($regex_ct, $res, $match_ct);
        preg_match($regex_cl, $res, $match_cl);
        $match = [
            'st' => isset($match_st[1]) ? $match_st[1] : 500,
            'ct' => isset($match_ct[1]) ? $match_ct[1] : 'application/octet-stream',
            'cl' => isset($match_cl[1]) ? $match_cl[1] : 0
        ];

        return $match;
    }
}
