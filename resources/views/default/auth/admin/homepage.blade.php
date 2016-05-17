{{--Created by PhpStorm. User: zhangxian Date: 16/5/16 Time: 下午1:45--}}
<html lang="ch">
<head>
    <meta charset="utf-8">
    <title>homepage</title>
    {{--<link type="text/css" rel="stylesheet" href="{{url('default/css/login.css')}}">--}}
</head>
<body>
<div>
    {{Auth::User() ? Auth::User()->name : '未登录'}}
    <a href="{{'admin/logout'}}">logout</a>
</div>
</body>
</html>