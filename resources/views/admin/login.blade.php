<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="Sign">

    <title>登录</title>
    <link href="{{ url('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('default/css/login.css')}}" rel="stylesheet">
    <style>
        h2 {
            text-align: center;
        }

        span {
            display: inline-block;
            width: 60px;
            height: 40px;
            line-height: 40px;
            text-align: left;
            font-weight: 500;
        }

        .verifycode {
            width: 100px !important;
            display: inline-block;
        }

        img {
            display: inline-block;
        }

        .login-payload {
            margin: 0 auto;
            width: 300px;
            height: 450px;
            border: 1px solid lightseagreen;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="login-payload">
        <form class="form-signin" action="{{url('admin/auth/login')}}" method="post">
            <h2 class="form-signin-heading">后台登录系统</h2>
            <span>用户名</span>
            <input type="text" name="username" class="form-control" placeholder="用户名" required autofocus>
            <span>密码</span>
            <input type="password" name="password" class="form-control" placeholder="密码" required>
            <span>验证码</span>
            <div>
                <input type="text" name="verifycode" class="form-control verifycode" placeholder="验证码" required>
                <img src="{{url('getverifycode')}}">
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me">记住密码
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
        </form>
    </div>
</div>
</body>
</html>
