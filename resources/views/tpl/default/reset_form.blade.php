<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>重置密码</title>
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
            <span class="text-size22 mg-left30">重置密码</span>
        </div>
        <div style="clear:both;"></div>
    </div>
    <div style="padding: 25px 40px;background-color: #fff;height: 418px;width: 334px;margin: 0 auto">
        <form style="margin-top:30px;" action="/reset_password" method="post" autocomplete="off">
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="请新密码" autocomplete="off">
                <br/>
                <input type="password" name="password" class="form-control" placeholder="再次输入新密码" autocomplete="off">
                <input type="hidden" name="token" value="{{$token}}">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;height:45px;margin-top: 10px">
                确认
            </button>
        </form>
    </div>
</div>
</body>
</html>