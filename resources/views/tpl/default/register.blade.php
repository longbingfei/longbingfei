<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
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
            <span class="text-size22 mg-left30">欢迎注册</span>
        </div>
        <div class="fr registerr">
            <div class="pull-right login-welcome text-size14">
                已有帐号？ 请<a href="/login" class="cor-blue text-under"> 登录</a>
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
                    <p class="text-size16">邮箱注册</p>
                    <form style="margin-top:30px;" action="/register" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="用户名" autocomplete="off" required >
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="邮箱" autocomplete="off" required >
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="密码" autocomplete="off" required >
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="repassword" placeholder="确认密码" autocomplete="off" required >
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" checked disabled>我已阅读并同意 《协议》
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%;">立即注册</button>
                    </form>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
</div>
</body>
</html>