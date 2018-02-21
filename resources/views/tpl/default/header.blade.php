<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>小丑鱼</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=0.1">
    <link rel="shortcut icon" href="/asset/web/image/fav.ico"/>
    <link rel="stylesheet" href="/asset/web/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/asset/web/plugins/ace/css/ace.min.css">
    <link rel="stylesheet" href="/asset/web/css/font-awesome.min.css">
    <link rel="stylesheet" href="/asset/web/css/main.css">
    <link rel="stylesheet" href="/asset/web/css/header.css">
    <link rel="stylesheet" href="/asset/web/css/footer.css">
    <link rel="stylesheet" href="/asset/web/css/blue/style.css">
    <link media="all" type="text/css" rel="stylesheet" href="/asset/web/css/index.css">
    <link media="all" type="text/css" rel="stylesheet" href="/asset/web/css/taskbar/taskindex.css">
    <link rel="stylesheet" href="/asset/web/css/index11.css">
    <link rel="stylesheet" href="/asset/web/css/shop.css">
    <link href="{{url('editor/themes/default/css/umeditor.css')}}" type="text/css" rel="stylesheet">
    <script src="/asset/web/plugins/ace/js/ace-extra.min.js"></script>
    <script src="/asset/web/plugins/jquery/jquery.min.js"></script>
    <script src="/asset/web/plugins/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<header>
    <div class="g-headertop ">
        <div class="container clearfix">
            <div class="row">
                <div class="col-xs-12 col-left col-right">
                    <div class="pull-left">
                    </div>
                    <div class="pull-right">
                        <div class="pull-left">@if(session('id'))欢迎你 <span
                                    style="color:orange;font-size: 16px">{{ session('username') }}</span> [<a
                                    href="/logout">退出</a>]@else请 [<a
                                    href="/login">登录</a>] [<a
                                    href="/register">免费注册</a>]@endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="g-taskhead">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-left col-right">
                    <div class="col-lg-3 col-md-6 col-sm-6 hidden-xs">
                        <div class="row">
                            <a href="/">
                                <img src="/asset/web/image/logo.png" class="img-responsive wrap-side-img"
                                     style="width: 150px;height: 60px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 hidden-sm visible-xs-block">
                        <div class="text-center">
                            <img src="/asset/web/image/logo.png" style="width: 150px;height: 60px;">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 hidden-xs">
                        <div class="g-tasksearch row">
                            <form action="" method="get" class="_search_form">
                                <div class="btn-group search-aBtn" role="group">
                                    <a href="javascript:;" type="button"
                                       class="btn btn-default dropdown-toggle search-btn-toggle _search_a" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">找需求</a>
                                    <span class="fa fa-angle-down"></span>
                                    <ul class="dropdown-menu search-btn-select" aria-labelledby="dLabel">
                                        <li><a>找需求</a></li>
                                        <li><a>找厂家</a></li>
                                        <li><a>找产品</a></li>
                                    </ul>
                                </div>
                                <i class="fa fa-search"></i>
                                <input type="text" class="input-boxshaw _search_input" placeholder="输入关键词" value=""/>
                                <button class="_search_btn">搜索</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-top header-show">
        <div class="container clearfix">
            <div class="row">
                <div class="col-xs-12 col-left col-right">
                    <nav class="navbar bg-blue navbar-default hov-nav" role="navigation">
                        <div class="collapse navbar-collapse pull-right g-nav pd-left0" id="example-navbar-collapse">
                            <div class="div-hover hidden-xs"></div>
                            <ul class="nav navbar-nav overhide">
                                <li class="hActive"><a class="topborbtm" href="/">首页</a></li>
                                <li><a class="topborbtm" href="/need">需求</a></li>
                                <li><a class="topborbtm" href="/company">厂家</a></li>
                                <li><a class="topborbtm" href="/p">产品</a></li>
                                @if(session('id'))
                                    <li><a class="topborbtm" href="/zone/{{ session('id') }}">个人中心</a></li>
                                @else
                                    <li><a class="topborbtm" href="/login">个人中心</a></li>
                                @endif
                                @if(session('id')==1)
                                    <li><a class="topborbtm" href="/admin_zone">管理中心</a></li>
                                @endif
                                <li class="pd-navppd">
                                    <form class="navbar-form navbar-left hd-seachW switchSearch" action="" role="search"
                                          method="get">
                                        <div class="input-group input-group-btnInput">
                                            <div class="input-group-btn search-aBtn">
                                                <a type="button"
                                                   class="search-btn-toggle btn btn-default dropdown-toggle f-click bg-white bor-radius2 hidden-xs hidden-sm"
                                                   data-toggle="dropdown"> 找需求 </a>
                                                <span class="caret hidden-xs hidden-sm"></span>
                                                <ul class="dropdown-menu s-listseed dropdown-yellow search-btn-select">
                                                    <li><a>找需求</a></li>
                                                    <li><a>找厂家</a></li>
                                                    <li><a>找产品</a></li>
                                                </ul>
                                            </div>
                                            <button type="submit"
                                                    class="form-control-feedback fa fa-search s-navfonticon hidden-sm hidden-xs"></button>
                                            <input type="text" name="keywords"
                                                   class="input-boxshaw form-control-feedback-btn form-control bor-radius2 hidden-sm hidden-xs">
                                            <a href="/create_need" type="submit"
                                               class="btn btn-default f-click cor-blue bor-radius2 hidden-lg hidden-md">发布需求</a>
                                        </div>
                                        <span class="hidden-md hidden-xs hidden-sm">
                                            <span class="u-tit">或</span>&nbsp;&nbsp;
                                            <a href="/create_need" type="submit"
                                               class="btn btn-default f-click cor-blue bor-radius2">发布需求</a>
                                        </span>
                                    </form>
                                </li>
                                <li class="s-sign clearfix hidden-md hidden-xs hidden-sm navactiveImg">
                                    @if(session('id'))
                                        <a href="/zone/{{ session('id') }}"
                                           class="text-size14 pull-left">{{ session('username') }}</a>
                                        <a class="pull-left">|</a>
                                        <a href="/logout" class="text-size14 pull-right">退出</a>
                                    @else
                                        <a href="/login" class="text-size14 pull-left">登录</a>
                                        <a class="pull-left">|</a>
                                        <a href="/register" class="text-size14 pull-right">注册</a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<nav>
    <div class="g-taskbarnav homemenu-taskbarnav">
        <div class="container clearfix">
            <div class="row g-nav">
                <div class="col-xs-12 clearfix col-left col-right" style="border-bottom: 2px solid blue">
                    <div class="pull-left hidden-xs">
                        @if(isset($index) && $index)
                            <div class="g-tasknavdrop" id="nav">资讯
                                <ul class="sub nav-dex text-left">
                                    @if($news)
                                        @foreach($news as $vo)
                                            <li style="overflow: hidden">
                                                <div class="u-navitem">
                                                    <h4><a href="/news/{{$vo['id']}}"
                                                           class="text-size14 cor-white">{{$vo['title']}}</a></h4>
                                                </div>
                                                <div class="g-subshow" style="overflow: hidden">
                                                    <div><a href="/news/{{$vo['id']}}">
                                                            <img width="300px" src="{{$vo['cover']}}"></a>
                                                    </div>
                                                    <p style="overflow: hidden">
                                                        <a href="/news/{{$vo['id']}}">{!! $vo['content'] !!}</a>
                                                    </p>
                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        <li>
                                            <div class="u-navitem">
                                                <h6>暂无资讯</h6>
                                            </div>
                                            <div class="g-subshow">
                                                <div>
                                                    <img width="300px" src="/asset/web/image/news_default.jpg">
                                                </div>
                                                <p>
                                                    暂无资讯
                                                </p>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        @endif
                        <div class="g-navList">
                            <a href="/" class="z-navHome">首页</a>
                            <a href="/need">需求</a>
                            <a href="/company">厂家</a>
                            <a href="/p">产品</a>
                            @if(session('id'))
                                <a href="/zone/{{ session('id') }}">个人中心</a>
                            @else
                                <a href="/login">个人中心</a>
                            @endif
                            @if(session('id')==1)
                                <a class="topborbtm" href="/admin_zone">管理中心</a>
                            @endif
                        </div>
                    </div>
                    <div class="pull-right g-tasknavbtn hidden-sm hidden-xs">
                        <a href="/create_need" class="u-ahref">发布需求</a>
                    </div>
                    @if(isset($index) && $index)
                        <div class="banner-r hidden-sm hidden-xs hidden-md" style="top:319px">
                            <div class="tab-content tab-top">
                            </div>
                            <div class="tabbable" style="text-align: center">
                                <p><a class="text-under">企业入驻</a></p>
                                <p><a class="text-under">企业管理</a></p>
                                <p><a class="text-under">发布需求</a></p>
                            </div>
                            @if(!session('id'))
                                <div class="tab-bot" style="text-align: center">
                                    <a href="/register" class=""><i class="fa fa-user"></i> 注册</a>
                                    <a href="/login" class=""><i class="fa fa-sign-in"></i> 登录</a>
                                </div>
                            @endif
                        </div>
                    @endif
                    <nav class="navbar navbar-default navbar-static navbar-static-position hidden-sm hidden-md hidden-lg col-xs-12"
                         id="navbar-example" role="navigation">
                        <div class="collapse navbar-collapse bs-js-navbar-scrollspy">
                            <ul class="nav navbar-nav">
                                <li><a href="/" class="z-navHome">首页</a></li>
                                <li><a href="/need">需求</a></li>
                                <li><a href="/company">厂家</a></li>
                                <li><a href="/p">产品</a></li>
                                @if(session('id'))
                                    <li><a href="/zone/{{ session('id') }}">个人中心</a></li>
                                @else
                                    <li><a href="/login">个人中心</a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="collapse navbar-collapse bs-js-navbar-scrollspy1 bg-white">
                            <ul class="nav navbar-nav clearfix">
                                <li class="clearfix">
                                    <a href="javascript:;" class="clearfix search-btn">
                                        <div class="g-tasksearch clearfix">
                                            <i class="fa fa-search"></i>
                                            <input type="text" placeholder="输入关键词" class="input-boxshaw"/>
                                            <button>搜索</button>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</nav>