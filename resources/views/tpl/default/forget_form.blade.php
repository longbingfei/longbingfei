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
    <div style="padding: 25px 40px;background-color: #fff;height: 418px;width: 334px;margin: 0 auto">
        <form style="margin-top:30px;" action="/send_email" method="post" autocomplete="off">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="请输入需要找回密码的用户名" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;height:45px;margin-top: 10px">
                确认
            </button>
        </form>
        <a href="/login" style="font-size: 10px;color:blue;float:right;margin-top: 10px">返回登录</a>
    </div>
</div>
</body>
</html>