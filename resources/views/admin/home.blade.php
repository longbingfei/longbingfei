<?php
$user = \Illuminate\Support\Facades\Auth::user();
$avatar_path = "default/images/default_avatar.jpeg";
if ($avatar = unserialize($user->avatar)) {
    $avatar_path = $avatar['thumb'];
}
?>
        <!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="Sign">
    <title>@yield('title','首页')</title>
    @section('link')
        <link rel="icon" href="{{ url('default/images/site.ico') }}" type="image/x-ico"/>
        <link href="{{ url('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('default/css/admin_home.css')}}" rel="stylesheet">
        <script src="{{ url('default/js/jquery.1.10.js') }}"></script>
        {{--<script src="{{ url('default/js/jquery.2.1.1.js') }}"></script>--}}
        <script src="{{ url('bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="{{ url('default/js/html5shiv.min.js') }}"></script>
        <script src="{{ url('default/js/respond.min.js') }}"></script>
        <![endif]-->
        <script src="{{ url('default/js/main.js') }}"></script>
        <script src="{{ url('default/js/ready.load.js') }}"></script>
    @show
    <style>
        @section('stylesheet')
        @show
    </style>
</head>
<body>
@section('nav')
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid sys-nav">
            <div class="navbar-header">
                <span class="navbar-brand"><i class="web-icon glyphicon glyphicon-grain"></i></span>
                <span class="control navbar-brand"><a href="{{url('admin/feature/style')}}">首页</a></span>
                <div class="profile navbar-brand">欢迎你,管理员:&nbsp<a>{{$user->username}}</a></div>
            </div>
        </div>
    </nav>
@show
<h3 class="subject-h3">@yield('subject','主题未定义')</h3>
@section('body')
@show
<script>
    //点击用户名弹出框
    var AccessToken = '{{\Illuminate\Support\Facades\Auth::User()->access_token}}';
    var Pms = '{!! \App\Http\CheckPermission\CheckPermission::getPermissions(\Illuminate\Support\Facades\Auth::User())!!}';
    var setProfileTime;
    var profileDiv = "<div class='profile_info'>" +
            "<ul class='list-group'>" +
            "<li class='list-group-item'><img src='{{url($avatar_path)}}'></li>" +
            "<li class='list-group-item'>" +
            "<span>上次登录:&nbsp</span>" +
            "<span class='login_info'>{{Date('m-d H:i:s',strtotime($user->last_login_time))}}</span>" +
            "</li>" +
            "<li class='list-group-item'>" +
            "<span>上次登录IP:&nbsp</span>" +
            "<span class='login_info'>{{$user->last_login_ip}}</span>" +
            "</li>" +
            "<li class='list-group-item' style='text-align:center'>" +
            "<a class='btn btn-default' href='{{url('admin/auth/logout')}}'>退出登录</a>" +
            "</li>" +
            "</ul>" +
            "</div>";
    $("body").append($(profileDiv));
    $(".profile").click(function () {
        $(".profile_info").fadeIn();
        setProfileTime = setTimeout(function () {
            $(".profile_info").fadeOut();
        }, 2000);
    });
    $(".profile_info").hover(function () {
        clearTimeout(setProfileTime);
    }, function () {
        $(this).fadeOut();
    });

    //判断登录时间给出弹出提示
    var last_login_time = '{{\Illuminate\Support\Facades\Auth::User()->last_login_time}}';
    var user_id = '{{\Illuminate\Support\Facades\Auth::Id()}}';
    if (localStorage.getItem("last_login_time_" + user_id) !== last_login_time) {
        $.Tip({
            message: '上次登录时间:' + last_login_time,
            width: '300px',
            height: '50px'
        }) ? localStorage.setItem("last_login_time_" + user_id, last_login_time) : true
    }
</script>
<script src="{{ url('default/js/afterVariableInit.js') }}"></script>
</body>
<footer>
    <div class="common-footer">
        <span>®2016 Kotana</span>&nbsp&nbsp&nbsp&nbsp
        <span>Designed By Sign</span>&nbsp&nbsp&nbsp&nbsp
        <span>E-mail:sign_mail@163.com</span>
    </div>
</footer>
</html>
