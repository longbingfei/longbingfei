<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Sign">
    <title>登录</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
            -o-font-smoothing: antialiased;
            font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        body {
            font-family: "Open Sans", Helvetica, Arial, sans-serif;
            font-weight: 300;
            font-size: 12px;
            line-height: 30px;
            color: #777;
            background: rgb(45, 59, 67);
        }

        .container {
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
            margin-top: 120px;
            position: relative;
        }

        #contact input[type="text"], #contact input[type="password"], #contact button[type="submit"] {
            font: 400 12px/16px "Open Sans", Helvetica, Arial, sans-serif;
        }

        #contact {
            background: #F9F9F9;
            padding: 25px;
            margin: 5px 0;
        }

        #contact h3 {
            color: #1b6d85;
            display: block;
            font-size: 30px;
            font-weight: 400;
            text-align: center;
        }

        fieldset {
            border: medium none !important;
            margin: 0 0 5px;
            min-width: 100%;
            padding: 0;
            width: 100%;
            position: relative;
        }

        #contact input[type="text"], #contact input[type="password"] {
            width: 100%;
            border: 1px solid #CCC;
            background: #FFF;
            margin: 0 0 5px;
            padding: 10px;
        }

        #contact input[type="text"]:hover, #contact input[type="password"]:hover {
            -webkit-transition: border-color 0.3s ease-in-out;
            -moz-transition: border-color 0.3s ease-in-out;
            transition: border-color 0.3s ease-in-out;
            border: 1px solid #AAA;
        }

        #contact button[type="submit"] {
            cursor: pointer;
            width: 100%;
            border: none;
            background: #1b6d85;
            color: #FFF;
            margin: 0 0 5px;
            padding: 10px;
            font-size: 15px;
        }

        #contact button[type="submit"]:hover {
            background: #09C;
            -webkit-transition: background 0.3s ease-in-out;
            -moz-transition: background 0.3s ease-in-out;
            transition: background-color 0.3s ease-in-out;
        }

        #contact button[type="submit"]:active {
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
        }

        #contact input:focus {
            outline: 0;
            border: 1px solid #999;
        }

        ::-webkit-input-placeholder {
            color: #888;
        }

        :-moz-placeholder {
            color: #888;
        }

        ::-moz-placeholder {
            color: #888;
        }

        :-ms-input-placeholder {
            color: #888;
        }

        img {
            position: absolute;
            margin-left: 10px;
            bottom: 5px;
            cursor: pointer;
        }

        span {
            display: block;
            color: rgb(45, 59, 67)
        }

        .error {
            width: 100%;
            height: 30px;
            line-height: 30px;
            margin-bottom: 5px;
            color: red;
            font-size:15px;
        }
    </style>
</head>
<body>
<div class="container">
    <form id="contact" action="{{url('admin/auth/login')}}" method="post">
        <h3>后台登录系统</h3><br/>
        <fieldset>
            <span>用户名</span>
            <input type="text" name="username" placeholder="用户名" tabindex="1" required autofocus>
        </fieldset>
        <fieldset>
            <span>密 码</span>
            <input type="password" name="password" placeholder="密码" required>
        </fieldset>
        <fieldset>
            <span>验证码</span>
            <input style="width:40%" type="text" name="verifycode" placeholder="看不清?点击图片刷新!" required
                   autocomplete="off">
            <img src="{{url('getverifycode')}}" onclick="refresh(this)">
        </fieldset>
        <fieldset>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </fieldset>
        <div class="error">{{empty($errors->all()) ? '' : current($errors->all())}}</div>
        <fieldset>
            <button name="submit" type="submit" data-submit="...Sending">
                登录
            </button>
        </fieldset>
    </form>
</div>
<script>
    function refresh(obj) {
        obj.src = obj.src + '?' + new Date().getTime();
    }
</script>
</body>
</html>
