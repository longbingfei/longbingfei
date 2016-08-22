{{$errorCode}}
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
</head>

<body>
<div class="container">
    <form class="form-signin" action="{{url('admin/auth/login')}}" method="post" >
        <h2 class="form-signin-heading">后台登录系统</h2>
        <label  class="sr-only">用户名</label>
        <input type="text" name="username" class="form-control" placeholder="用户名" required autofocus>
        <label  class="sr-only">密码</label>
        <input type="password"  name="password" class="form-control" placeholder="密码" required>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
    </form>
</div> 
</body>
</html>
