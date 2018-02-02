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
    <link rel="stylesheet" href="/asset/web/css/index11.css">
    <link media="all" type="text/css" rel="stylesheet" href="/asset/web/css/taskbar/taskindex.css">
    <link media="all" type="text/css" rel="stylesheet" href="/asset/web/css/station.css">
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
                                <li><a class="topborbtm" href="">厂家</a></li>
                                <li><a class="topborbtm" href="">产品</a></li>
                                <li><a class="topborbtm" href="">个人中心</a></li>
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
                        <div class="g-navList">
                            <a href="/" class="z-navHome">首页</a>
                            <a href="/need">需求</a>
                            <a href="">厂家</a>
                            <a href="">产品</a>
                            <a href="">个人中心</a>
                        </div>
                    </div>
                    <div class="pull-right g-tasknavbtn hidden-sm hidden-xs">
                        <a href="/task/create" class="u-ahref">发布需求</a>
                    </div>
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
                                <li><a href="">厂家</a></li>
                                <li><a href="">产品</a></li>
                                <li><a href="">个人中心</a></li>
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

<section>
    <div class="container">
        <div class="row">
            <div class="g-taskposition col-lg-12 col-left">您的位置：<a href="/">首页</a> > 任务大厅</div>
            <div class="col-lg-12 col-left">
                <div class="g-taskprocess hidden-xs">
                    <div class="row">
                        <div class="col-md-4 col-xs-4">
                            <div class="g-taskpro1 pull-left"><span>免费发布任务</span>
                                <p>免费发布</p></div>
                            <div class="g-taskproico1 pull-right">></div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <div class="g-taskpro2 pull-left"><span>服务商投标</span>
                                <p>多家威客，择优雇佣</p></div>
                            <div class="g-taskproico2 pull-right">></div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <div class="g-taskpro3"><span>担保交易</span>
                                <p>担保交易，满意付款</p></div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="g-taskclassify clearfix  table-responsive">
                        <div class="col-xs-12 clearfix task-type">
                            <div class="row">
                                <div class="col-lg-1 cor-gray51 text-size14 col-sm-2 col-xs-12">任务模式</div>
                                <div class="col-lg-11 col-sm-10  col-xs-12">
                                    <a class="bg-blue" href="http://demo.kppw.cn/task?taskType=0">全部</a>

                                    <a class="" href="http://demo.kppw.cn/task?taskType=1">悬赏任务</a>

                                    <a class="" href="http://demo.kppw.cn/task?taskType=3">招标任务</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 clearfix task-type">
                            <div class="row">
                                <div class="col-lg-1 cor-gray51 text-size14 col-sm-2 col-xs-12">任务分类</div>
                                <div class="col-lg-11 col-sm-10  col-xs-12">
                                    <a class="bg-blue" href="http://demo.kppw.cn/task?category=0">全部</a>
                                    <a class="" href="http://demo.kppw.cn/task?category=351">软件开发</a>
                                    <a class="" href="http://demo.kppw.cn/task?category=353">生活服务</a>
                                    <a class="" href="http://demo.kppw.cn/task?category=354">家装/建筑</a>
                                    <a class="" href="http://demo.kppw.cn/task?category=358">法律服务</a>
                                    <a class="" href="http://demo.kppw.cn/task?category=359">航空服务</a>
                                    <a class="" href="http://demo.kppw.cn/task?category=360">电子娱乐</a>
                                    <a class="" href="http://demo.kppw.cn/task?category=361">网络营销</a>
                                    <div class="pull-right select-fa-angle-down">
                                        <i class="fa fa-angle-down text-size14 show-next"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 clearfix service-type">
                            <div class="row">
                                <div class="col-lg-1 cor-gray51 text-size14 col-sm-2 col-xs-12"></div>
                                <div class="col-lg-11 col-sm-10 col-xs-12">
                                    <a class="" href="http://demo.kppw.cn/task?category=362">宣传/设计</a>
                                </div>
                            </div>
                        </div>
                        <div class="collapse col-xs-12 task-filter-content" id="collapseExample">
                            <div class="well clearfix task-well-content">
                                <a class="" href="http://demo.kppw.cn/task?category=0">全部</a>
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                                   aria-controls="collapseExample" class=""
                                   href="http://demo.kppw.cn/task?category=351">软件开发</a>
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                                   aria-controls="collapseExample" class=""
                                   href="http://demo.kppw.cn/task?category=353">生活服务</a>
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                                   aria-controls="collapseExample" class=""
                                   href="http://demo.kppw.cn/task?category=354">家装/建筑</a>
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                                   aria-controls="collapseExample" class=""
                                   href="http://demo.kppw.cn/task?category=358">法律服务</a>
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                                   aria-controls="collapseExample" class=""
                                   href="http://demo.kppw.cn/task?category=359">航空服务</a>
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                                   aria-controls="collapseExample" class=""
                                   href="http://demo.kppw.cn/task?category=360">电子娱乐</a>
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                                   aria-controls="collapseExample" class=""
                                   href="http://demo.kppw.cn/task?category=361">网络营销</a>
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                                   aria-controls="collapseExample" class=""
                                   href="http://demo.kppw.cn/task?category=362">宣传/设计</a>
                                <button type="button" class="close task-filter-close cor-blue2f" data-toggle="collapse"
                                        href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    <span aria-hidden="true" class="cor-blue2f">&times;</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-xs-12 clearfix">
                            <div class="row">
                                <div class="col-lg-1 col-sm-2 col-md-2 cor-gray51 text-size14 col-xs-12">任务状态</div>
                                <div class="col-lg-11 col-sm-10 col-md-10 col-xs-12">
                                    <a class="bg-blue" href="http://demo.kppw.cn/task?">全部</a>
                                    <a class="" href="http://demo.kppw.cn/task?status=1">工作中</a>
                                    <!--<a class="" href="http://demo.kppw.cn/task?status=2">选稿中</a>
                                    <a class="" href="http://demo.kppw.cn/task?status=3">交付中</a> -->
                                    <a class="" href="http://demo.kppw.cn/task?status=12">已完成</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 clearfix task-area">
                            <div class="row">
                                <div class="col-lg-1 col-sm-2 col-md-2 cor-gray51 text-size14 col-xs-12">
                                    <div class="task-dq-label">
                                        地区限制
                                    </div>
                                </div>
                                <div class="col-lg-11 col-sm-10 col-md-10 col-xs-12">
                                    <div class="pull-right select-fa-angle-down">
                                        <i class="fa fa-angle-down text-size14 show-next"></i>
                                    </div>
                                    <a class="bg-blue" href="http://demo.kppw.cn/task?province=0">全部</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=1">北京市</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=4">山西省</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=5">内蒙古</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=9">上海市</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=10">江苏省</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=11">浙江省</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=12">安徽省</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 clearfix service-area">
                            <div class="row">
                                <div class="col-lg-1 col-sm-2 col-md-2 cor-gray51 text-size14 col-xs-12">
                                    <div class="task-dq-label">

                                    </div>
                                </div>
                                <div class="col-lg-11 col-sm-10 col-md-10 col-xs-12">
                                    <a class="" href="http://demo.kppw.cn/task?province=13">福建省</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=14">江西省</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=15">山东省</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=16">河南省</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=17">湖北省</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=18">湖南省</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=19">广东省</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=20">广西</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=21">海南省</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=22">重庆市</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=24">贵州省</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=25">云南省</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=26">西藏</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=27">陕西省</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=28">甘肃省</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=29">青海省</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=30">宁夏</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=31">新疆</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=32">台湾省</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=33">香港</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=34">澳门</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=35">海外</a>
                                    <a class="" href="http://demo.kppw.cn/task?province=36">其他</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="g-taskmain">
                    <div class="clearfix g-taskmainhd">
                        <div class="pull-left">
                            <a class="g-taskmact" href="http://demo.kppw.cn/task?">综合</a><span>|</span>
                            <a class=" g-taskmaintime" href="http://demo.kppw.cn/task?desc=created_at">发布时间 <i
                                        class="glyphicon glyphicon-arrow-down"></i></a><span>|</span>
                            <a class="" href="http://demo.kppw.cn/task?desc=delivery_count">稿件数</a><span>|</span>
                            <a class="" href="http://demo.kppw.cn/task?desc=bounty">金额</a>
                        </div>
                        <form action="/task" method="get"/>
                        <div class="pull-left g-taskmaininp">
                            <input type="text" name="keywords" placeholder="请输入关键字"/>
                            <button type="submit">
                                <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                            </button>
                        </div>
                        </form>
                    </div>
                    <ul class="g-taskmainlist">
                        <li class="clearfix">
                            <div class="row">
                                <div class="col-lg-9 col-sm-8">
                                    <div class="text-size16">
                                        <b class="cor-orange">￥1.00</b>
                                        <a href="http://demo.kppw.cn/task/2068" target="_blank">
                                            <b>打印</b>
                                        </a>
                                    </div>
                                    <p class="cor-gray87">
                                        <i class="ace-icon fa fa-user bigger-110 cor-grayd2"></i> 13451...&nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-eye cor-grayd2"></i> 28人浏览/1人投稿&nbsp;&nbsp;&nbsp;
                                        <span class="hidden-xs">
                                <i class="fa fa-clock-o cor-grayd2"></i>
                                1天前&nbsp;&nbsp;&nbsp;
                            </span>
                                        <i class="fa fa-unlock-alt cor-grayd2"></i>
                                        已托管赏金
                                    </p>
                                    <p class="cor-gray51 hidden-xs">一个房屋 </p>
                                </div>
                                <div class="cor-gray87 text-size14 pull-up hidden-xs col-lg-3 col-sm-4">
                                    <div class="text-right">
                            <span class="u-inline u-timeollect">
                                                                    <i class="u-tasktime"></i>
                                    <span class="cor-red">10天7时</span> 后截止投标
                                                            </span>
                                        <span class="fa fa-star u-collect" data-values="1" data-toggle="tooltip"
                                              data-placement="top" title="收藏" data-id="2068"></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="row">
                                <div class="col-lg-9 col-sm-8">
                                    <div class="text-size16">
                                        <b class="cor-orange">￥1.00</b>
                                        <a href="http://demo.kppw.cn/task/2067" target="_blank">
                                            <b>3d打印一个房屋</b>
                                        </a>
                                        <span class="bg-orange span-pd2">件</span>
                                    </div>
                                    <p class="cor-gray87">
                                        <i class="ace-icon fa fa-user bigger-110 cor-grayd2"></i> test&nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-eye cor-grayd2"></i> 23人浏览/0人投稿&nbsp;&nbsp;&nbsp;
                                        <span class="hidden-xs">
                                <i class="fa fa-clock-o cor-grayd2"></i>
                                1天前&nbsp;&nbsp;&nbsp;
                            </span>
                                        <i class="fa fa-unlock-alt cor-grayd2"></i>
                                        已托管赏金
                                    </p>
                                    <p class="cor-gray51 hidden-xs">3d打印一个房屋3d打印一个房屋 </p>
                                </div>
                                <div class="cor-gray87 text-size14 pull-up hidden-xs col-lg-3 col-sm-4">
                                    <div class="text-right">
                            <span class="u-inline u-timeollect">
                                                                    <i class="u-tasktime"></i>
                                    <span class="cor-red">10天7时</span> 后截止投标
                                                            </span>
                                        <span class="fa fa-star u-collect" data-values="1" data-toggle="tooltip"
                                              data-placement="top" title="收藏" data-id="2067"></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="row">
                                <div class="col-lg-9 col-sm-8">
                                    <div class="text-size16">
                                        <b class="cor-orange">￥1.00</b>
                                        <a href="http://demo.kppw.cn/task/2063" target="_blank">
                                            <b>1/26-3</b>
                                        </a>
                                        <span class="bg-orange span-pd2">索</span>
                                        <span class="bg-red span-pd2">件</span>
                                    </div>
                                    <p class="cor-gray87">
                                        <i class="ace-icon fa fa-user bigger-110 cor-grayd2"></i> 18566...&nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-eye cor-grayd2"></i> 31人浏览/0人投稿&nbsp;&nbsp;&nbsp;
                                        <span class="hidden-xs">
                                <i class="fa fa-clock-o cor-grayd2"></i>
                                7天前&nbsp;&nbsp;&nbsp;
                            </span>
                                        <i class="fa fa-unlock-alt cor-grayd2"></i>
                                        已托管赏金
                                    </p>
                                    <p class="cor-gray51 hidden-xs">阿萨德法撒旦法 </p>
                                </div>
                                <div class="cor-gray87 text-size14 pull-up hidden-xs col-lg-3 col-sm-4">
                                    <div class="text-right">
                            <span class="u-inline u-timeollect">
                                                                    <i class="u-tasktime"></i>
                                    <span class="cor-red">4天7时</span> 后截止投标
                                                            </span>
                                        <span class="fa fa-star u-collect" data-values="1" data-toggle="tooltip"
                                              data-placement="top" title="收藏" data-id="2063"></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="row">
                                <div class="col-lg-9 col-sm-8">
                                    <div class="text-size16">
                                        <b class="cor-orange">￥20.00</b>
                                        <a href="http://demo.kppw.cn/task/2061" target="_blank">
                                            <b>1/26-2</b>
                                        </a>
                                        <span class="bg-orange span-pd2">顶</span>
                                        <span class="bg-red span-pd2">顶</span>
                                        <span class="bg-orange span-pd2">急</span>
                                    </div>
                                    <p class="cor-gray87">
                                        <i class="ace-icon fa fa-user bigger-110 cor-grayd2"></i> 18566...&nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-eye cor-grayd2"></i> 16人浏览/0人投稿&nbsp;&nbsp;&nbsp;
                                        <span class="hidden-xs">
                                <i class="fa fa-clock-o cor-grayd2"></i>
                                7天前&nbsp;&nbsp;&nbsp;
                            </span>
                                        <i class="fa fa-unlock-alt cor-grayd2"></i>
                                        已托管赏金
                                    </p>
                                    <p class="cor-gray51 hidden-xs">期待企鹅的企鹅舞 </p>
                                </div>
                                <div class="cor-gray87 text-size14 pull-up hidden-xs col-lg-3 col-sm-4">
                                    <div class="text-right">
                            <span class="u-inline u-timeollect">
                                                                    <i class="u-tasktime"></i>
                                    <span class="cor-red">4天7时</span> 后截止投标
                                                            </span>
                                        <span class="fa fa-star u-collect" data-values="1" data-toggle="tooltip"
                                              data-placement="top" title="收藏" data-id="2061"></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="row">
                                <div class="col-lg-9 col-sm-8">
                                    <div class="text-size16">
                                        <b class="cor-orange">￥100.00</b>
                                        <a href="http://demo.kppw.cn/task/2058" target="_blank">
                                            <b>1/26阿萨德法撒旦发射</b>
                                        </a>
                                        <span class="bg-orange span-pd2">顶</span>
                                        <span class="bg-red span-pd2">急</span>
                                    </div>
                                    <p class="cor-gray87">
                                        <i class="ace-icon fa fa-user bigger-110 cor-grayd2"></i> 18566...&nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-eye cor-grayd2"></i> 24人浏览/0人投稿&nbsp;&nbsp;&nbsp;
                                        <span class="hidden-xs">
                                <i class="fa fa-clock-o cor-grayd2"></i>
                                7天前&nbsp;&nbsp;&nbsp;
                            </span>
                                        <i class="fa fa-unlock-alt cor-grayd2"></i>
                                        已托管赏金
                                    </p>
                                    <p class="cor-gray51 hidden-xs">阿萨德法撒旦法萨德法撒旦法撒旦发达省份 </p>
                                </div>
                                <div class="cor-gray87 text-size14 pull-up hidden-xs col-lg-3 col-sm-4">
                                    <div class="text-right">
                            <span class="u-inline u-timeollect">
                                                                    <i class="u-tasktime"></i>
                                    <span class="cor-red">4天7时</span> 后截止投标
                                                            </span>
                                        <span class="fa fa-star u-collect" data-values="1" data-toggle="tooltip"
                                              data-placement="top" title="收藏" data-id="2058"></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="row">
                                <div class="col-lg-9 col-sm-8">
                                    <div class="text-size16">
                                        <b class="cor-orange">￥5000.00</b>
                                        <a href="http://demo.kppw.cn/task/2049" target="_blank">
                                            <b>jjjjjjkkkkkkkkk</b>
                                        </a>
                                        <span class="bg-orange span-pd2">顶</span>
                                    </div>
                                    <p class="cor-gray87">
                                        <i class="ace-icon fa fa-user bigger-110 cor-grayd2"></i> test&nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-eye cor-grayd2"></i> 15人浏览/0人投稿&nbsp;&nbsp;&nbsp;
                                        <span class="hidden-xs">
                                <i class="fa fa-clock-o cor-grayd2"></i>
                                8天前&nbsp;&nbsp;&nbsp;
                            </span>
                                        <i class="fa fa-unlock-alt cor-grayd2"></i>
                                        已托管赏金
                                    </p>
                                    <p class="cor-gray51 hidden-xs">jjjjjjkkkkkkkkkk </p>
                                </div>
                                <div class="cor-gray87 text-size14 pull-up hidden-xs col-lg-3 col-sm-4">
                                    <div class="text-right">
                            <span class="u-inline u-timeollect">
                                                                    <i class="u-tasktime"></i>
                                    <span class="cor-red">2天7时</span> 后截止投标
                                                            </span>
                                        <span class="fa fa-star u-collect" data-values="1" data-toggle="tooltip"
                                              data-placement="top" title="收藏" data-id="2049"></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="row">
                                <div class="col-lg-9 col-sm-8">
                                    <div class="text-size16">
                                        <b class="cor-orange">￥100.00</b>
                                        <a href="http://demo.kppw.cn/task/2043" target="_blank">
                                            <b>1/23-1啊多萨法撒旦法撒旦发射点发分</b>
                                        </a>
                                        <span class="bg-orange span-pd2">顶</span>
                                        <span class="bg-red span-pd2">顶</span>
                                        <span class="bg-orange span-pd2">急</span>
                                    </div>
                                    <p class="cor-gray87">
                                        <i class="ace-icon fa fa-user bigger-110 cor-grayd2"></i> test&nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-eye cor-grayd2"></i> 39人浏览/1人投稿&nbsp;&nbsp;&nbsp;
                                        <span class="hidden-xs">
                                <i class="fa fa-clock-o cor-grayd2"></i>
                                10天前&nbsp;&nbsp;&nbsp;
                            </span>
                                        <i class="fa fa-unlock-alt cor-grayd2"></i>
                                        已托管赏金
                                    </p>
                                    <p class="cor-gray51 hidden-xs">阿萨德法撒旦法萨德法撒旦法撒旦分 </p>
                                </div>
                                <div class="cor-gray87 text-size14 pull-up hidden-xs col-lg-3 col-sm-4">
                                    <div class="text-right">
                            <span class="u-inline u-timeollect">
                                                                    <i class="u-tasktime"></i>
                                    <span class="cor-red">1天7时</span> 后截止投标
                                                            </span>
                                        <span class="fa fa-star u-collect" data-values="1" data-toggle="tooltip"
                                              data-placement="top" title="收藏" data-id="2043"></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="row">
                                <div class="col-lg-9 col-sm-8">
                                    <div class="text-size16">
                                        <b class="cor-orange">￥1000.00</b>
                                        <a href="http://demo.kppw.cn/task/2033" target="_blank">
                                            <b>测试任务城市</b>
                                        </a>
                                    </div>
                                    <p class="cor-gray87">
                                        <i class="ace-icon fa fa-user bigger-110 cor-grayd2"></i> 学会...&nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-eye cor-grayd2"></i> 36人浏览/1人投稿&nbsp;&nbsp;&nbsp;
                                        <span class="hidden-xs">
                                <i class="fa fa-clock-o cor-grayd2"></i>
                                11天前&nbsp;&nbsp;&nbsp;
                            </span>
                                        <i class="fa fa-unlock-alt cor-grayd2"></i>
                                        已托管赏金
                                    </p>
                                    <p class="cor-gray51 hidden-xs">
                                        测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市测试任务城市 </p>
                                </div>
                                <div class="cor-gray87 text-size14 pull-up hidden-xs col-lg-3 col-sm-4">
                                    <div class="text-right">
                            <span class="u-inline u-timeollect">
                                                                    <i class="u-tasktime"></i>
                                    <span class="cor-red">7时23分</span> 后截止投标
                                                            </span>
                                        <span class="fa fa-star u-collect" data-values="1" data-toggle="tooltip"
                                              data-placement="top" title="收藏" data-id="2033"></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="row">
                                <div class="col-lg-9 col-sm-8">
                                    <div class="text-size16">
                                        <b class="cor-orange">￥200.00</b>
                                        <a href="http://demo.kppw.cn/task/2031" target="_blank">
                                            <b>山东分公司</b>
                                        </a>
                                        <span class="bg-orange span-pd2">顶</span>
                                        <span class="bg-red span-pd2">急</span>
                                    </div>
                                    <p class="cor-gray87">
                                        <i class="ace-icon fa fa-user bigger-110 cor-grayd2"></i> 18566...&nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-eye cor-grayd2"></i> 34人浏览/0人投稿&nbsp;&nbsp;&nbsp;
                                        <span class="hidden-xs">
                                <i class="fa fa-clock-o cor-grayd2"></i>
                                11天前&nbsp;&nbsp;&nbsp;
                            </span>
                                        <i class="fa fa-unlock-alt cor-grayd2"></i>
                                        已托管赏金
                                    </p>
                                    <p class="cor-gray51 hidden-xs">使得法国使得法国 </p>
                                </div>
                                <div class="cor-gray87 text-size14 pull-up hidden-xs col-lg-3 col-sm-4">
                                    <div class="text-right">
                            <span class="u-inline u-timeollect">
                                                                    <i class="u-tasktime"></i>
                                    <span class="cor-red">7时23分</span> 后截止投标
                                                            </span>
                                        <span class="fa fa-star u-collect" data-values="1" data-toggle="tooltip"
                                              data-placement="top" title="收藏" data-id="2031"></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="row">
                                <div class="col-lg-9 col-sm-8">
                                    <div class="text-size16">
                                        <b class="cor-orange">￥1000.00</b>
                                        <a href="http://demo.kppw.cn/task/2030" target="_blank">
                                            <b>测试发布任务</b>
                                        </a>
                                        <span class="bg-orange span-pd2">急</span>
                                    </div>
                                    <p class="cor-gray87">
                                        <i class="ace-icon fa fa-user bigger-110 cor-grayd2"></i> 学会...&nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-eye cor-grayd2"></i> 30人浏览/1人投稿&nbsp;&nbsp;&nbsp;
                                        <span class="hidden-xs">
                                <i class="fa fa-clock-o cor-grayd2"></i>
                                11天前&nbsp;&nbsp;&nbsp;
                            </span>
                                        <i class="fa fa-unlock-alt cor-grayd2"></i>
                                        已托管赏金
                                    </p>
                                    <p class="cor-gray51 hidden-xs">
                                        测试发布任务测试发布任务测试发布任务测试发布任务测试发布任务测试发布任务测试发布任务测试发布任务测试发布任务测试发布任务测试发布任务测试发布任务测试发布任务测试发布任务测试发布任务测试发布任务测试发布任务测试发布任务测试发布任务测试发布任务测试发布任务 </p>
                                </div>
                                <div class="cor-gray87 text-size14 pull-up hidden-xs col-lg-3 col-sm-4">
                                    <div class="text-right">
                            <span class="u-inline u-timeollect">
                                                                    <i class="u-tasktime"></i>
                                    <span class="cor-red">7时23分</span> 后截止投标
                                                            </span>
                                        <span class="fa fa-star u-collect" data-values="1" data-toggle="tooltip"
                                              data-placement="top" title="收藏" data-id="2030"></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clearfix">
                    <div class="g-taskpaginfo">
                        显示 1~
                        10
                        项 共 137 个任务
                    </div>
                    <div class="paginationwrap">
                        <ul class="pagination">
                            <li class="disabled"><span>&laquo;</span></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="http://demo.kppw.cn/task?page=2">2</a></li>
                            <li><a href="http://demo.kppw.cn/task?page=3">3</a></li>
                            <li><a href="http://demo.kppw.cn/task?page=4">4</a></li>
                            <li><a href="http://demo.kppw.cn/task?page=5">5</a></li>
                            <li><a href="http://demo.kppw.cn/task?page=6">6</a></li>
                            <li><a href="http://demo.kppw.cn/task?page=7">7</a></li>
                            <li><a href="http://demo.kppw.cn/task?page=8">8</a></li>
                            <li class="disabled"><span>...</span></li>
                            <li><a href="http://demo.kppw.cn/task?page=13">13</a></li>
                            <li><a href="http://demo.kppw.cn/task?page=14">14</a></li>
                            <li><a href="http://demo.kppw.cn/task?page=2" rel="next">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <div class="space-14"></div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 g-address col-left">
                    <div>
                        <a target="_blank" href="/article/aboutUs/53">帮助中心</a>
                        <span></span>
                        <a target="_blank" href="/article/aboutUs/29">关于我们</a>
                        <span></span>
                        <a target="_blank" href="/article/aboutUs/30">服务条款</a>
                        <span></span>
                        <a target="_blank" href="/article/aboutUs/65">空间规则</a>
                        <span></span>
                    </div>
                    <div class="space-6"></div>
                    <p class="cor-gray87">公司名称：武汉客客 &nbsp;&nbsp;地址：湖北省武汉市洪山区华工孵化中心9楼</p>
                    <p class="cor-gray87 kppw-tit">
                        Powered by <a href="http://www.kppw.cn" target="_blank">KPPW</a>3.3 Copyright 2009 -2020 KPPW.
                        All rights reserved <a href='http://www.miitbeian.gov.cn/' target='_blank'>鄂ICP备 11009411号-1</a>
                    </p>
                </div>
                <div class="col-lg-3 g-contact visible-lg-block hidden-sm hidden-md hidden-xs">
                    <div class="cor-gray71 text-size14 g-contacthd"><span>联系方式</span></div>
                    <div class="space-6"></div>
                    <p class="cor-gray97">服务热线：400-967-3922</p>
                    <p class="cor-gray97">Email：kppw@kekezu.com</p>
                </div>
                <div class="col-lg-3 focusus visible-lg-block hidden-sm hidden-md hidden-xs col-left">
                    <div class="cor-gray71 text-size14 focusushd"><span>关注我们</span></div>
                    <div class="space-8"></div>
                    <div class="clearfix">
                        <div class="foc foc-bg">
                            <a class="focususwx foc-wx" href=""></a>
                            <div class="foc-ewm">
                                <div class="foc-ewm-arrow1"></div>
                                <div class="foc-ewm-arrow2"></div>
                                <img src="http://demo.kppw.cn/attachment/sys/8fe9cf15a8b86d799c4e3e9dbaf64362.png"
                                     alt="" width="100" height="100">
                            </div>
                        </div>
                        <div class="foc"><a class="focususqq" href="http://www.Tencent.com" target="_blank"></a></div>
                        <div class="foc"><a class="focususwb" href="http://weibo.com/kekezu" target="_blank"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link media="all" type="text/css" rel="stylesheet" href="/asset/web/css/im.css">
        <div class="im-side1 pull-left im-info im-ck ">
            <div class="text-right im-side1-colos">
                <a href=""><i class="fa fa-close imClose" data-dismiss="alert"></i></a>
            </div>
            <div class="im-side1-list1 clearfix">
                <div class="pull-left chat-t-head">
                    <img src="" alt="..." class="img-circle" width="44" height="44"/>
                </div>
                <div class="im-side1-title">
                    <h4 class="f-size16 mg-margin0 title-tit cor-gury51 chat-t-name"></h4>

                    <p class="cor-gury9c f-size12 tit-time mg-margin0 chat-t-sign"></p>
                </div>
            </div>
            <div class="im-side1-list2 clearfix">
                <ul class="pd-padding0  mg-margin0 clearfix" id="talkarea">
                    <!-- 聊天区域 -->
                </ul>
            </div>
            <div class="im-side1-list3 clearfix">
            <textarea name="" id="chat-text" cols="30" rows="100%" placeholder="说点什么"
                      class="im-side1-list3-input"></textarea>

                <div class="text-right">
                    <button class="btn im-btn"><i class="fa  fa-paper-plane"></i> 发送</button>
                </div>
            </div>
        </div>
        <div class="im-side2 pull-left">

            <div class="im-side1-list3 clearfix imContact">
                <i class="fa fa-paper-plane f-size20 pull-left mg-top12"></i>
                <!--<a href="" class="f-size12">登录</a>-->
                <a href="http://demo.kppw.cn/login">请先登录</a>

            </div>
        </div>
    </div>
    <input type="hidden" name="fromUid" value="">
    <div id="ImIp" data-im="118.31.189.221"></div>
    <div id="ImPort" data-im="9501"></div>
    <div id="online" data-im-online=""></div>

</footer>
<script src="/asset/web/plugins/jquery/jquery.min.js"></script>
<script src="/asset/web/js/doc/jquery.cookie.js"></script>
<script src="/asset/web/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/asset/web/plugins/ace/js/ace.min.js"></script>
<script src="/asset/web/plugins/ace/js/ace-elements.min.js"></script>
<script src="/asset/web/js/common.js"></script>
<script src="/asset/web/js/nav.js"></script>
<script src="/asset/web/plugins/jquery/validform/js/Validform_v5.3.2_min.js"></script>
<script src="/asset/web/plugins/ace/js/jquery.gritter.min.js"></script>
<script src="/asset/web/js/im.js"></script>
<script src="/asset/web/js/doc/taskindex.js"></script>
<script src="/asset/web/js/doc/layer.js"></script>
</body>