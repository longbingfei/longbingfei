<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 17/1/10
 * Time: 下午5:00
 */
namespace App\Traits;
Trait Functions
{
    //创建目录
    protected function checkDir($path, $show_path = false)
    {
        if (!is_dir($path)) {
            @mkdir($path, 0775, 1);
        }

        return is_dir($path) && is_writeable($path) ? ($show_path ? $path : true) : false;
    }

    //获取模型
    protected function getModel($module)
    {
        $model = array_reduce(explode('_', $module), function($x, $y) {
            return ucfirst($x) . ucfirst($y);
        });
        $model = 'App\Models\\' . $model;

        return class_exists($model) ? $model : false;
    }

    //数组对比
    protected function arrayCompare($A, $B, $check_key = true)
    {
        sort($A);
        sort($B);
        if (count($A) !== count($B)) {
            return false;
        }
        if (!$check_key) {
            $A = array_values($A);
            $B = array_values($B);
        }
        foreach ($A as $key => $vo) {
            if (is_array($vo)) {
                if (!isset($B[$key])) {
                    return false;
                }

                return $this->arrayCompare($vo, $B[$key], $check_key);
            } else {
                if ($vo !== $B[$key]) {
                    return false;
                }
            }
        }

        return true;
    }

    //获取url信息
    protected function getUrlInfo($url)
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

    //下载文件
    protected function download($url)
    {
        $url = urldecode(trim($url));
        $urlinfo = $this->getUrlInfo($url);
        if ($urlinfo['st'] != 200) {
            switch ($urlinfo['st']) {
                case 302:
                    $error_code = 1401;
                    break;
                case 401:
                    $error_code = 1402;
                    break;
                case 403:
                    $error_code = 1403;
                    break;
                case 404:
                    $error_code = 1400;
                    break;
                case 500:
                    $error_code = 1404;
                    break;
            }

            return ['error_code' => $error_code];
        }
        $filename = last(explode('/', $url));
        $mode = stripos(PHP_OS, 'WIN') === 0 ? 'rb' : 'r';
        $handle = @fopen($url, $mode);
        if (!$handle) {
            return ['error_code' => 1405];
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

    //获取验证码
    protected function makeVerifyCode()
    {
        $number = str_random(5);
        session()->flash('verifycode', $number);
        $image = \Intervention\Image\Facades\Image::canvas(90, 40, array(mt_rand(210, 255), mt_rand(210, 255), mt_rand(210, 255)))
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
}