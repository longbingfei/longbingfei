<?php

namespace App\Http\Controllers\Common;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CommonController extends Controller
{
    public function __construct()
    {
        //
    }

    public function getVerifyCode()
    {
        $number = mt_rand(10000, 99999);
        session()->flash('verifycode', $number);
        $image = Image::canvas(90, 40, array(mt_rand(210, 255), mt_rand(210, 255), mt_rand(210, 255)))
            ->text($number, 0, 15, function($font) {
                $font->size(25);
                $font->file('/Library/Fonts/AppleGothic.ttf');
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
            ->response('jpg');

        return $image;
    }
}
