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
        <link href="{{ url('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('default/css/admin_home.css')}}" rel="stylesheet">
        <script src="{{ url('default/js/jquery.js') }}"></script>
        <script src="{{ url('bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('default/js/main.js') }}"></script>
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
            <span class="navbar-brand">system</span>
            <span class="article active navbar-brand"><a href="{{url('admin/feature/article')}}">Article</a></span>
            <span class="product navbar-brand"><a href="{{url('admin/feature/product')}}">Product</a></span>
            <span class="style navbar-brand"><a href="javascript:void(0)">Style</a></span>
            <div class="profile navbar-brand">欢迎你,管理员:&nbsp<a>{{$user->username}}</a></div>
        </div>
    </div>
</nav>
@show
<h3>@yield('subject','主题未定义')</h3>
@section('body')
@show
<script>
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
        $(".profile_info").fadeToggle();
    });
</script>
</body>
<footer>
    <div class="common-footer">
        <span>®2016 Kotana</span>&nbsp&nbsp&nbsp&nbsp
        <span>Designed By Sign</span>&nbsp&nbsp&nbsp&nbsp
        <span class="glyphicon glyphicon-envelope">sign_mail@163.com</span>
    </div>
</footer>
</html>
