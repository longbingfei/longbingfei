<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="Sign">

    <title>test</title>

    <link href="{{ url('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('default/css/admin_home.css')}}" rel="stylesheet">
    <script>
    </script>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">system</a>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar menu">
                <li class="article active"><a href="javascript:void(0)">Article</a></li>
                <li class="media"><a href="javascript:void(0)">Media</a></li>
                <li class="product"><a href="javascript:void(0)">Product</a></li>
                <li class="zone"><a href="javascript:void(0)">Zone</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        </div>
    </div>
</div>
<script src="{{ url('default/js/jquery.js') }}"></script>
<script src="{{ url('bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script>
    $(".article").on('click',function(){
        $(".menu li").removeClass("active");
        $(this).addClass("active");
        $.getJSON("{{url('admin/feature/article')}}",function(data){
            var data = JSON.stringify(data);
            //$dom.load(url,data,function(){}) -->data为对象则调用的post ,string则调用get
            $(".main").load("{{url('admin/feature/page_article')}}",{"data":data});
        });
    });
    $(".zone").on('click',function(){
        $(".menu li").removeClass("active");
        $(this).addClass("active");
        $.getJSON("{{url('admin/auth/zone')}}",function(data){
            console.log(data);
            $(".main").empty().load("{{url('admin/feature/page_zone')}}",{"data":data});
        })
    });
    $(".media").on('click',function(){
        $(".menu li").removeClass("active");
        $(this).addClass("active");
        $.getJSON("{{url('admin/feature/media')}}",function(data){
            console.log(data);
            $(".main").empty().load("{{url('admin/feature/page_media')}}",{"data":data});
        })
    });
    window.onload = $(".article").click();
</script>
</body>
</html>
