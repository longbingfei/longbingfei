<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>忘记密码</title>
    <link rel="shortcut icon" href="/asset/web/image/fav.ico"/>
    <link rel="stylesheet" href="/asset/web/css/sign/resize.css">
    <link rel="stylesheet" href="/asset/web/css/sign/bootstrap.css">
    <link rel="stylesheet" href="/asset/web/css/sign/style.css">
</head>
<body>
<div class="container-all">
    <div class="header-top">
        <div class="fl registerl">
            <a href="/index"><img src="/asset/web/image/logo.png" class="logo-login" style="width:150px"></a>
            <span class="text-size22 mg-left30">忘记密码</span>
        </div>
        <div style="clear:both;"></div>
    </div>
    <div class="content" style="width:300px;margin:0 auto">
        @if($mail)
            系统已发送一封邮件到你的注册邮箱<span style="color:orange;font-size:16px">{{$mail}}</span>请前往验证。
        @else
            未检测到注册邮箱，请联系管理员，QQ:1527734488。
        @endif
    </div>
</div>
</body>
</html>