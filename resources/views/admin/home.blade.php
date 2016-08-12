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
        #pagination-digg li { border:0; margin:0; padding:0; font-size:13px; list-style:none; /* savers */
        float:left;box-shadow: 1px 1px 2px grey}
        #pagination-digg a { border:solid 1px #f7f7f9; margin-right:2px; }
        /*#pagination-digg .previous-o{ border:solid 1px #DEDEDE; color:#888888;display:block; float:left; font-weight:bold; margin-right:2px; padding:3px 4px; }*/
        #pagination-digg .next a,#pagination-digg .previous a { font-weight:bold; }
        #pagination-digg .active { background:#2e6ab1; color:#FFFFFF; font-weight:bold; display:block; float:left;padding:4px 6px; /* savers */ margin-right:2px; }
        #pagination-digg a:link,#pagination-digg a:visited { color:#0e509e; display:block; float:left; padding:3px
        6px; text-decoration:none; }
        #pagination-digg a:hover { border:solid 1px #0e509e; }
    @show
    </style>
</head>
<body>
@section('body')
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <span class="navbar-brand">system</span>
            <span class="article active navbar-brand"><a href="{{url('admin/feature/article')}}">Article</a></span>
            <span class="product navbar-brand"><a href="{{url('admin/feature/product')}}">Product</a></span>
            <span class="style navbar-brand"><a href="javascript:void(0)">Style</a></span>
            <sapn class="zone navbar-brand"><a href="javascript:void(0)">Zone</a></sapn>
        </div>
    </div>
</nav>
@show
<div class="container-fluid main">
</div>
<script>
    {{--$(".article").on('click',{dataUrl:"{{url('admin/feature/article')}}",loadUrl:"{{url('admin/feature/page_article')}}"},Frame.Load);--}}
    {{--$(".medias").on('click',{dataUrl:"{{url('admin/feature/media')}}",loadUrl:"{{url('admin/feature/page_media')}}"},Frame.Load);--}}
    {{--$(".product").on('click',{dataUrl:"{{url('admin/feature/product')}}",loadUrl:"{{url('admin/feature/page_product')}}"},Frame.Load);--}}
    {{--$(".style").on('click',{dataUrl:"{{url('admin/feature/style')}}",loadUrl:"{{url('admin/feature/page_style')}}"},Frame.Load);--}}
    {{--$(".zone").on('click',{dataUrl:"{{url('admin/auth/zone')}}",loadUrl:"{{url('admin/feature/page_zone')}}"},Frame.Load);--}}
    {{--window.onload = $(".article").click();--}}
</script>
</body>
</html>
