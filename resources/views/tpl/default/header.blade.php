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
    <link media="all" type="text/css" rel="stylesheet" href="/asset/web/css/station.css">
    <link rel="stylesheet" href="/asset/web/css/index11.css">
    <link rel="stylesheet" href="/asset/web/css/shop.css">
    <script src="/asset/web/plugins/ace/js/ace-extra.min.js"></script>
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
                        <div class="pull-left">HI~</a>请 [<a href="http://localhost:8000/login">登录</a>] [<a
                                    href="http://localhost:8000/register">免费注册</a>]
                        </div>
                        <ul class="pull-left g-taskbarlist hidden-sm hidden-xs">
                            <li class="pull-left g-taskbarli"><a class="g-taskbar1 g-taskbarbor"
                                                                 href="/user/myTasksList">我是雇主 <i
                                            class="fa fa-caret-down"></i></a>
                                <div class="g-taskbardown1">
                                    <div><a class="cor-blue2f" href="/task/create">发布任务</a></div>
                                    <div><a class="cor-blue2f" href="/user/myTasksList">我发布的任务<span class="red"></span></a>
                                    </div>
                                </div>
                            </li>
                            <li class="pull-left g-taskbarli"><a class="g-taskbar2 g-taskbarbor"
                                                                 href="/user/acceptTasksList">我是威客 <i
                                            class="fa fa-caret-down"></i></a>
                                <div class="g-taskbardown1">
                                    <div><a class="cor-blue2f" href="/user/personCase">我的空间</a></div>
                                    <div><a class="cor-blue2f" href="/user/myTask">我的任务<span class="red"></span></a>
                                    </div>
                                </div>
                            </li>
                            <li class="pull-left"><a class="g-taskbarbor" href="/article/aboutUs/31">帮助中心</a></li>
                            <li class="pull-left g-taskbarli"><a class="g-nomdright g-taskbarbor" href="javascript:;">分类导航
                                    <i class="fa fa-caret-down"></i></a>
                                <div class="g-taskbardown1">
                                    <div><a class="cor-blue2f" href="/task?category=170">软件开发</a></div>
                                    <div><a class="cor-blue2f" href="/task?category=169">生活服务</a></div>
                                    <div><a class="cor-blue2f" href="/task?category=168">家装/建筑</a></div>
                                    <div><a class="cor-blue2f" href="/task?category=167">宣传/设计</a></div>
                                    <div><a class="cor-blue2f" href="/task?category=166">网络营销</a></div>
                                </div>
                            </li>
                        </ul>
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
                                <img src="/asset/web/image/logo.png" class="img-responsive wrap-side-img">
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 hidden-sm visible-xs-block">
                        <div class="text-center">
                            <img src="/asset/web/image/logo.png">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 hidden-xs">
                        <div class="g-tasksearch row">
                            <form action="/task" method="get" class="switchSearch"/>
                            <div class="btn-group search-aBtn" role="group">
                                <a href="javascript:;" type="button"
                                   class="btn btn-default dropdown-toggle search-btn-toggle" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    找任务
                                </a>
                                <span class="fa fa-angle-down"></span>
                                <ul class="dropdown-menu search-btn-select" aria-labelledby="dLabel">
                                    <li value="1">
                                        <a href="javascript:void(0)" url="/task" onclick="switchSearch(this)">找任务</a>
                                    </li>
                                    <li value="2">
                                        <a href="javascript:void(0)" url="/bre/service" onclick="switchSearch(this)">找服务商</a>
                                    </li>
                                </ul>
                            </div>
                            <i class="fa fa-search"></i>
                            <input type="text" class="input-boxshaw" placeholder="输入关键词" value=""/>
                            <button>搜索</button>
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
                                <li><a class="topborbtm" href="/product">产品</a></li>
                                <li><a class="topborbtm" href="/zone">个人中心</a></li>
                                <li class="pd-navppd">
                                    <form class="navbar-form navbar-left hd-seachW" action="/task" role="search"
                                          method="get" class="switchSearch">
                                        <div class="input-group input-group-btnInput">
                                            <div class="input-group-btn search-aBtn">
                                                <a type="button"
                                                   class="search-btn-toggle btn btn-default dropdown-toggle f-click bg-white bor-radius2 hidden-xs hidden-sm"
                                                   data-toggle="dropdown">
                                                    找任务
                                                </a>
                                                <span class="caret hidden-xs hidden-sm"></span>
                                                <ul class="dropdown-menu s-listseed dropdown-yellow search-btn-select">
                                                    <li><a href="javascript:void(0)" url="/task"
                                                           onclick="switchSearch(this)">找任务</a></li>
                                                    <li><a href="javascript:void(0)" url="/bre/service"
                                                           onclick="switchSearch(this)">找服务商</a></li>
                                                </ul>
                                            </div><!-- /btn-group -->
                                            <button type="submit"
                                                    class="form-control-feedback fa fa-search s-navfonticon hidden-sm hidden-xs"></button>
                                            <input type="text" name="keywords"
                                                   class="input-boxshaw form-control-feedback-btn form-control bor-radius2 hidden-sm hidden-xs"
                                                   value="">
                                            <a href="/task/create" type="submit"
                                               class="btn btn-default f-click cor-blue bor-radius2 hidden-lg hidden-md">发布任务</a>
                                        </div>
                                        <span class="hidden-md hidden-xs hidden-sm">&nbsp;&nbsp;<span
                                                    class="u-tit">或</span>&nbsp;&nbsp;
    <a href="/task/create" type="submit" class="btn btn-default f-click cor-blue bor-radius2">发布任务</a></span>
                                    </form>
                                </li>
                                <li class="s-sign clearfix hidden-md hidden-xs hidden-sm navactiveImg">
                                    <a href="http://localhost:8000/login" class="text-size14 pull-left">登录</a><a
                                            class="pull-left">|</a><a href="http://localhost:8000/register"
                                                                      class="text-size14 pull-right">注册</a>
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
                <div class="col-xs-12 clearfix col-left col-right">
                    <div class="pull-left hidden-xs">
                        @if(isset($index) && $index)
                            <div class="g-tasknavdrop" id="nav">资讯
                                <ul class="sub nav-dex text-left">
                                    <li>
                                        <div class="u-navitem">
                                            <h4><a href="" class="text-size14 cor-white">资讯1</a></h4>
                                        </div>
                                        <div class="g-subshow">
                                            <div>资讯1</div>
                                            <p>123</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="u-navitem">
                                            <h4><a href="" class="text-size14 cor-white">资讯2</a></h4>
                                        </div>
                                        <div class="g-subshow">
                                            <div>资讯2</div>
                                            <p>123</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="u-navitem">
                                            <h4><a href="" class="text-size14 cor-white">资讯3</a></h4>
                                        </div>
                                        <div class="g-subshow">
                                            <div>资讯3</div>
                                            <p>123</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="u-navitem">
                                            <h4><a href="" class="text-size14 cor-white">资讯4</a></h4>
                                        </div>
                                        <div class="g-subshow">
                                            <div>资讯4</div>
                                            <p>123</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @endif
                        <div class="g-navList">
                            <a href="/" class="z-navHome">首页</a>
                            <a href="/need">需求</a>
                            <a href="/company">厂家</a>
                            <a href="/product">产品</a>
                            <a href="/zone">个人中心</a>
                        </div>
                    </div>
                    <div class="pull-right g-tasknavbtn hidden-sm hidden-xs">
                        <a href="/task/create" class="u-ahref">发布需求</a>
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
                        <div class="tab-bot" style="text-align: center">
                            <a href="/article/aboutUs/31" class=""><i class="fa fa-user"></i> 注册</a>
                            <a href="/user/personCase" class=""><i class="fa fa-sign-in"></i> 登录</a>
                        </div>
                    </div>
                    @endif
                    <nav class="navbar navbar-default navbar-static navbar-static-position hidden-sm hidden-md hidden-lg col-xs-12"
                         id="navbar-example" role="navigation">
                        <div class="navbar-header">
                            <button class="navbar-toggle z-activeNavlist" type="button" data-toggle="collapse"
                                    data-target=".bs-js-navbar-scrollspy">
                                <span class="sr-only">切换导航</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <button class="navbar-toggle mg-right0" type="button" data-toggle="collapse"
                                    data-target=".bs-js-navbar-scrollspy1">
                                <span class="fa fa-search"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse bs-js-navbar-scrollspy">
                            <ul class="nav navbar-nav">
                                <li><a href="/" class="z-navHome">首页</a></li>
                                <li><a href="/need">需求</a></li>
                                <li><a href="/company">厂家</a></li>
                                <li><a href="/product">产品</a></li>
                                <li><a href="/zone">个人中心</a></li>
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