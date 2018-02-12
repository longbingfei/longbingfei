<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
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
            <span class="text-size22 mg-left30">欢迎登录</span>
        </div>
        <div class="fr registerr">
            <div class="pull-right login-welcome text-size14">
                <a href="/register" class="cor-blue text-under"> 注册</a>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
    <div class="content-wrap">
        <div class="content-wrap-all">
            <div class="fl col-lg-7 col-md-7">
                <img src="{{$image}}" class="img-responsive">
            </div>
            <div class="fr col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="loginmain">
                    <p class="text-size16" style="margin-top: 10px">帐号登录</p>
                    <hr/>
                    <form style="margin-top:30px;" action="/login" method="post" autocomplete="off">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="用户名" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="密码" autocomplete="off">
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%;height:45px;margin-top: 10px">
                            立即登录
                        </button>
                    </form>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
</div>
</body>
</html>