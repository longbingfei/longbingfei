{{--Created by PhpStorm. User: zhangxian Date: 16/5/16 Time: 下午1:45--}}
<html lang="ch">
<head>
    <meta charset="utf-8">
    <title>welcome adminstrator</title>
    <link type="text/css" rel="stylesheet" href="{{url('default/css/login.css')}}">
</head>
<body>
<div class="login-main">
    <div>
        <form action="{{url('admin/auth/login')}}" method="post">
            <input type="text" name="username">
            <input type="password" name="password">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button>submit</button>
        </form>
    </div>
</div>
</body>
</html>
