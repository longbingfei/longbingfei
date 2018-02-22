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
        @if($return['code'])
            <span style="color:red;font-size: 18px">密码重置失败,{{isset($return['msg']) ? $return['msg'] : '请稍后重试!'}}</span>
        @else
            <span style="color:green;font-size: 18px">密码重置成功,请重新登录！</span>
        @endif
    </div>
</div>
</body>
</html>