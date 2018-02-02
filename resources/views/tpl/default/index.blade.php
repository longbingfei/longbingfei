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
    <link media="all" type="text/css" rel="stylesheet" href="/asset/web/css/index.css">
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
    <li  class="hActive" ><a class="topborbtm" href="/"  >首页</a></li>
    <li><a class="topborbtm" href=""  >需求</a></li>
    <li><a class="topborbtm" href=""  >厂家</a></li>
    <li><a class="topborbtm" href=""  >产品</a></li>
    <li><a class="topborbtm" href=""  >个人中心</a></li>
    <li class="pd-navppd">
    <form class="navbar-form navbar-left hd-seachW" action="/task" role="search" method="get" class="switchSearch">
    <div class="input-group input-group-btnInput">
    <div class="input-group-btn search-aBtn">
    <a type="button" class="search-btn-toggle btn btn-default dropdown-toggle f-click bg-white bor-radius2 hidden-xs hidden-sm" data-toggle="dropdown">
    找任务
    </a>
    <span class="caret hidden-xs hidden-sm"></span>
    <ul class="dropdown-menu s-listseed dropdown-yellow search-btn-select">
    <li><a href="javascript:void(0)" url="/task" onclick="switchSearch(this)">找任务</a></li>
    <li><a href="javascript:void(0)" url="/bre/service" onclick="switchSearch(this)">找服务商</a></li>
    </ul>
    </div><!-- /btn-group -->
    <button type="submit" class="form-control-feedback fa fa-search s-navfonticon hidden-sm hidden-xs"></button>
    <input type="text" name="keywords" class="input-boxshaw form-control-feedback-btn form-control bor-radius2 hidden-sm hidden-xs" value="">
    <a href="/task/create" type="submit" class="btn btn-default f-click cor-blue bor-radius2 hidden-lg hidden-md">发布任务</a>
    </div>
    <span class="hidden-md hidden-xs hidden-sm">&nbsp;&nbsp;<span class="u-tit">或</span>&nbsp;&nbsp;
    <a href="/task/create" type="submit" class="btn btn-default f-click cor-blue bor-radius2">发布任务</a></span>
    </form>
    </li>
    <li class="s-sign clearfix hidden-md hidden-xs hidden-sm navactiveImg">
    <a href="http://localhost:8000/login" class="text-size14 pull-left">登录</a><a class="pull-left">|</a><a href="http://localhost:8000/register" class="text-size14 pull-right">注册</a>
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
                            <a href="" class="z-navHome">首页</a>
                            <a href="">需求</a>
                            <a href="">厂家</a>
                            <a href="">产品</a>
                            <a href="">个人中心</a>
                        </div>
                    </div>
                    <div class="pull-right g-tasknavbtn hidden-sm hidden-xs">
                        <a href="/task/create" class="u-ahref">发布需求</a>
                    </div>
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
                                <li><a href="" class="z-navHome">首页</a></li>
                                <li><a href="">需求</a></li>
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

{{--pc--}}
<div class="g-banner hidden-sm hidden-xs hidden-md">
    <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
            <li data-target="#carousel-example-generic" data-slide-to="5"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active item-banner1">
                <a href="javascript:;">
                    <div>
                        <img src="/asset/web/images/banner1.jpg" alt="..." class="img-responsive itm-banner"
                             data-adaptive-background='1'>
                    </div>
                </a>
            </div>
            <div class="item item-banner2">
                <a href="javascript:;">
                    <div>
                        <img src="/asset/web/images/banner2.jpg" alt="..." class="img-responsive itm-banner"
                             data-adaptive-background='2'>
                    </div>
                </a>
            </div>
            <div class="item item-banner3">
                <a href="javascript:;">
                    <div>
                        <img src="/asset/web/images/banner3.jpg" alt="..." class="img-responsive itm-banner"
                             data-adaptive-background='3'>
                    </div>
                </a>
            </div>
            <div class="item item-banner4">
                <a href="javascript:;">
                    <div>
                        <img src="/asset/web/images/banner4.jpg" alt="..." class="img-responsive itm-banner"
                             data-adaptive-background='4'>
                    </div>
                </a>
            </div>
            <div class="item item-banner5">
                <a href="javascript:;">
                    <div>
                        <img src="/asset/web/images/banner5.jpg" alt="..." class="img-responsive itm-banner"
                             data-adaptive-background='5'>
                    </div>
                </a>
            </div>
            <div class="item item-banner6">
                <a href="javascript:;">
                    <div>
                        <img src="/asset/web/images/banner1.jpg" alt="..." class="img-responsive itm-banner"
                             data-adaptive-background='6'>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="space-6 hidden-lg hidden-md hidden-sm visible-xs-block "></div>

{{--小屏幕--}}
<div class="container hidden-lg visible-md-block visible-sm-block visible-xs-block ">
    <div class="row">
        <div class="col-xs-12 col-left col-right">
            <div class="g-banner">
                <div id="carousel-example-generic1" class="carousel slide carousel-fade" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <a href="javascript:;" class="u-item1">
                                <img src="/asset/web/images/banner1.jpg" alt="..." class="img-responsive">
                            </a>
                        </div>
                        <div class="item">
                            <a href="javascript:;">
                                <img src="/asset/web/images/banner2.jpg" height="460" width="100%" alt="..."
                                     class="img-responsive">
                            </a>
                        </div>
                        <div class="item">
                            <a href="javascript:;">
                                <img src="/asset/web/images/banner3.jpg" height="460" width="100%" alt="..."
                                     class="img-responsive">
                            </a>
                        </div>
                        <div class="item">
                            <a href="javascript:;" class="u-item1">
                                <img src="/asset/web/images/banner4.jpg" alt="..." class="img-responsive">
                            </a>
                        </div>
                        <div class="item">
                            <a href="javascript:;">
                                <img src="/asset/web/images/banner5.jpg" height="460" width="100%" alt="..."
                                     class="img-responsive">
                            </a>
                        </div>
                        <div class="item">
                            <a href="javascript:;">
                                <img src="/asset/web/images/banner1.jpg" height="460" width="100%" alt="..."
                                     class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--侧边小插件-->
<div class="go-top dn" id="go-top">
    <div class="uc-2vm u-hov">
        <form class="form-horizontal" action="/bre/feedbackInfo" method="post" enctype="multipart/form-data"
              id="complain">
            <input type="hidden" name="_token" value="knwYG0ZcXYGXNghR5QHjF0QS8oLGmEjHGttp4Y4n">
            <div class="u-pop dn clearfix">
                <input type="text" name="uid" style="display:none">
                <h2 class="mg-margin text-size12 cor-gray51">一句话点评</h2>
                <div class="space-4"></div>
                <textarea class="form-control" rows="3" name="desc"
                          placeholder="期待您的一句话点评，不管是批评、感谢还是建议，我们都将会细心聆听，及时回复"></textarea>

                <div class="space-4"></div>
                <input type="text" name="phone" placeholder="填写手机号">

                <button type="submit" class="btn-blue btn btn-sm btn-primary">提交</button>
                <div class="arrow">
                    <div class="arrow-sanjiao"></div>
                    <div class="arrow-sanjiao-big"></div>
                </div>
            </div>
        </form>
    </div>
    <div class="feedback u-hov">
        <div class="dn dnd">
            <h2 class="mg-margin text-size12 cor-gray51">在线时间：09:00 -18:00</h2>
            <div class="space-4"></div>
            <div>
                <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=1668966921&amp;site=qq&amp;menu=yes" target="_blank"><img
                            src="/asset/web/images/pa.jpg" alt=""></a>
            </div>
            <div class="hr"></div>
            <div class="iss-ico1">
                <p class="cor-gray51 mg-margin">全国免长途电话：</p>
                <p class="text-size20 cor-gray51">027-87733922</p>
            </div>
            <div class="arrow">
                <div class="arrow-sanjiao feedback-sanjiao"></div>
                <div class="arrow-sanjiao-big feedback-sanjiao-big"></div>
            </div>
        </div>
    </div>
    <a href="javascript:;" class="go u-hov"></a>
</div>

<section>
    <div class="container">
        <div class="row">
            <div class="space-10 hidden-md hidden-sm hidden-xs"></div>
            <div class="col-sm-12 col-left col-right">
                <div class="clearfix u-grayico hidden-md hidden-sm hidden-xs">
                    <div class="col-md-3 s-ico clearfix">
                        <div class="pull-right">
                            <h4 class="text-size16 cor-gray51">有需求？</h4>
                            <p class="cor-gray97">万千威客为您出谋划策</p>
                        </div>
                    </div>
                    <div class="col-md-3 s-ico s-ico2">
                        <div class="pull-right">
                            <h4 class="text-size16 cor-gray51">找任务</h4>
                            <p class="cor-gray97">海量需求任你来挑</p>
                        </div>
                    </div>
                    <div class="col-md-3 s-ico s-ico3">
                        <div class="pull-right">
                            <h4 class="text-size16 cor-gray51">快速交易</h4>
                            <p class="cor-gray97">轻松交易快速解决</p>
                        </div>
                    </div>
                    <div class="col-md-3 s-ico s-ico4">
                        <div class="pull-right">
                            <h4 class="text-size16 cor-gray51">畅无忧</h4>
                            <p class="cor-gray97">快速接单畅通无阻</p>
                        </div>
                    </div>
                </div>
                <div class="space-10"></div>
            </div>

            <div class="space-10"></div>
            <div class="clearfix">
                <div class="col-sm-12 m-task col-left col-right">
                    <div class="clearfix txc">
                        <h4 class="text-size24 cor-gray45">最新需求</h4>
                        {{--<a class="pull-right cor-gray97 u-more" href="/task" target="_blank">More></a>--}}
                    </div>
                    <div class="space-4"></div>
                    <div class="g-taskleft b-border clearfix">
                        <div class="space"></div>
                        <ul class=" clearfix text-size14 m-homelist cor-grayC2 mg-margin col-sm-12">
                            <li class="col-md-4 col-sm-5 col-xs-6">
                                <div class="z1">
                                    <table>
                                        <tr>
                                            <td colspan="2" title="我勒个打去去去去去去去拉拉就来啊啊">我勒个打去去去去去去去拉拉就来啊啊</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">预算: 10000000</td>
                                        </tr>
                                    </table>
                                    <div>
                                        <span title="发布地址"><i class="glyphicon glyphicon-map-marker"></i> <span class="info">洛阳市</span></span>
                                        <span title="报名人数"><i class="glyphicon glyphicon-user"></i> <span class="info">9527</span></span>
                                        <span title="发布时间"><i class="glyphicon glyphicon-time"></i> <span class="info">2018/02/02</span></span>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-5 col-xs-6">
                                <div class="z1">
                                    <table>
                                        <tr>
                                            <td colspan="2" title="我勒个打去去去去去去去拉拉就来啊啊">我勒个打去去去去去去去拉拉就来啊啊</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">预算: 10000000</td>
                                        </tr>
                                    </table>
                                    <div>
                                        <span title="发布地址"><i class="glyphicon glyphicon-map-marker"></i> <span class="info">洛阳市</span></span>
                                        <span title="报名人数"><i class="glyphicon glyphicon-user"></i> <span class="info">9527</span></span>
                                        <span title="发布时间"><i class="glyphicon glyphicon-time"></i> <span class="info">2018/02/02</span></span>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-5 col-xs-6 ">
                                <div class="z1">
                                    <table>
                                        <tr>
                                            <td colspan="2" title="我勒个打去去去去去去去拉拉就来啊啊">我勒个打去去去去去去去拉拉就来啊啊</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">预算: 10000000</td>
                                        </tr>
                                    </table>
                                    <div>
                                        <span title="发布地址"><i class="glyphicon glyphicon-map-marker"></i> <span class="info">洛阳市</span></span>
                                        <span title="报名人数"><i class="glyphicon glyphicon-user"></i> <span class="info">9527</span></span>
                                        <span title="发布时间"><i class="glyphicon glyphicon-time"></i> <span class="info">2018/02/02</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="space-10"></div>
            <div class="clearfix">
                <div class="col-sm-12 m-task col-left col-right">
                    <div class="clearfix txc">
                        <h4 class="text-size24 cor-gray45">推荐需求</h4>
                        {{--<a class="pull-right cor-gray97 u-more" href="/task" target="_blank">More></a>--}}
                    </div>
                    <div class="space-4"></div>
                    <div class="g-taskleft b-border clearfix">
                        <div class="space"></div>
                        <ul class=" clearfix text-size14 m-homelist cor-grayC2 mg-margin col-sm-12">
                            <li class="col-md-4 col-sm-5 col-xs-6">
                                <div class="z1">
                                    <table>
                                        <tr>
                                            <td colspan="2" title="我勒个打去去去去去去去拉拉就来啊啊">我勒个打去去去去去去去拉拉就来啊啊</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">预算: 10000000</td>
                                        </tr>
                                    </table>
                                    <div>
                                        <span title="发布地址"><i class="glyphicon glyphicon-map-marker"></i> <span class="info">洛阳市</span></span>
                                        <span title="报名人数"><i class="glyphicon glyphicon-user"></i> <span class="info">9527</span></span>
                                        <span title="发布时间"><i class="glyphicon glyphicon-time"></i> <span class="info">2018/02/02</span></span>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-5 col-xs-6">
                                <div class="z1">
                                    <table>
                                        <tr>
                                            <td colspan="2" title="我勒个打去去去去去去去拉拉就来啊啊">我勒个打去去去去去去去拉拉就来啊啊</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">预算: 10000000</td>
                                        </tr>
                                    </table>
                                    <div>
                                        <span title="发布地址"><i class="glyphicon glyphicon-map-marker"></i> <span class="info">洛阳市</span></span>
                                        <span title="报名人数"><i class="glyphicon glyphicon-user"></i> <span class="info">9527</span></span>
                                        <span title="发布时间"><i class="glyphicon glyphicon-time"></i> <span class="info">2018/02/02</span></span>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-5 col-xs-6 ">
                                <div class="z1">
                                    <table>
                                        <tr>
                                            <td colspan="2" title="我勒个打去去去去去去去拉拉就来啊啊">我勒个打去去去去去去去拉拉就来啊啊</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">预算: 10000000</td>
                                        </tr>
                                    </table>
                                    <div>
                                        <span title="发布地址"><i class="glyphicon glyphicon-map-marker"></i> <span class="info">洛阳市</span></span>
                                        <span title="报名人数"><i class="glyphicon glyphicon-user"></i> <span class="info">9527</span></span>
                                        <span title="发布时间"><i class="glyphicon glyphicon-time"></i> <span class="info">2018/02/02</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="space-10"></div>
            <div class="clearfix">
                <div class="col-sm-12 m-task col-left col-right">
                    <div class="clearfix txc">
                        <h4 class="text-size24 cor-gray45">最新入驻厂家</h4>
                        {{--<a class="pull-right cor-gray97 u-more" href="/task" target="_blank">More></a>--}}
                    </div>
                    <div class="space-4"></div>
                    <div class="g-taskleft b-border clearfix">
                        <div class="space"></div>
                        <ul class=" clearfix text-size14 m-homelist cor-grayC2 mg-margin col-sm-12">
                            <li class="col-md-4 col-sm-5 col-xs-6 g-taskItem">
                                <div class="z2">
                                    <div>
                                        <img src="https://ss0.baidu.com/6ONWsjip0QIZ8tyhnq/it/u=1546389624,1783247210&fm=58" alt="logo">
                                    </div>
                                    <div>
                                        <table>
                                            <tr>
                                                <td colspan="2" title="华为科技有限公司南京分公司">华为科技有限公司南京分公司</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">总评: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-5 col-xs-6 g-taskItem">
                                <div class="z2">
                                    <div>
                                        <img src="http://bjmhasset.b0.upaiyun.com/assets/level3/layout/portal/home-3002c8dd8255b9d37e79af8a486b0a2c.gif" alt="logo">
                                    </div>
                                    <div>
                                        <table>
                                            <tr>
                                                <td colspan="2" title="暴漫">暴漫</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">总评: <i class="fa fa-star"></i><i class="fa fa-star"></i></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-5 col-xs-6 g-taskItem">
                                <div class="z2">
                                    <div>
                                        <img src="https://ss0.baidu.com/6ONWsjip0QIZ8tyhnq/it/u=1546389624,1783247210&fm=58" alt="logo">
                                    </div>
                                    <div>
                                        <table>
                                            <tr>
                                                <td colspan="2" title="华为科技有限公司南京分公司">华为科技有限公司南京分公司</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">总评: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="space-10"></div>
            <div class="clearfix">
                <div class="col-sm-12 m-task col-left col-right">
                    <div class="clearfix txc">
                        <h4 class="text-size24 cor-gray45">推荐厂家</h4>
                        {{--<a class="pull-right cor-gray97 u-more" href="/task" target="_blank">More></a>--}}
                    </div>
                    <div class="space-4"></div>
                    <div class="g-taskleft b-border clearfix">
                        <div class="space"></div>
                        <ul class=" clearfix text-size14 m-homelist cor-grayC2 mg-margin col-sm-12">
                            <li class="col-md-4 col-sm-5 col-xs-6 g-taskItem">
                                <div class="z2">
                                    <div>
                                        <img src="https://ss0.baidu.com/6ONWsjip0QIZ8tyhnq/it/u=1546389624,1783247210&fm=58" alt="logo">
                                    </div>
                                    <div>
                                        <table>
                                            <tr>
                                                <td colspan="2" title="华为科技有限公司南京分公司">华为科技有限公司南京分公司</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">总评: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-5 col-xs-6 g-taskItem">
                                <div class="z2">
                                    <div>
                                        <img src="https://ss0.baidu.com/6ONWsjip0QIZ8tyhnq/it/u=1546389624,1783247210&fm=58" alt="logo">
                                    </div>
                                    <div>
                                        <table>
                                            <tr>
                                                <td colspan="2" title="华为科技有限公司南京分公司">华为科技有限公司南京分公司</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">总评: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-5 col-xs-6 g-taskItem">
                                <div class="z2">
                                    <div>
                                        <img src="https://ss0.baidu.com/6ONWsjip0QIZ8tyhnq/it/u=1546389624,1783247210&fm=58" alt="logo">
                                    </div>
                                    <div>
                                        <table>
                                            <tr>
                                                <td colspan="2" title="华为科技有限公司南京分公司">华为科技有限公司南京分公司</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">总评: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="space-10"></div>
            <div class="clearfix">
                <div class="col-sm-12 m-task col-left col-right">
                    <div class="clearfix txc">
                        <h4 class="text-size24 cor-gray45">最新发布产品</h4>
                        {{--<a class="pull-right cor-gray97 u-more" href="/task" target="_blank">More></a>--}}
                    </div>
                    <div class="space-4"></div>
                    <div class="g-taskleft b-border clearfix">
                        <div class="space"></div>
                        <ul class=" clearfix text-size14 m-homelist cor-grayC2 mg-margin col-sm-12">
                            <li class="col-md-4 col-sm-5 col-xs-6 g-taskItem">
                                <div class="z2 z3">
                                    <div>
                                        <img src="https://gss3.bdstatic.com/7Po3dSag_xI4khGkpoWK1HF6hhy/baike/c0%3Dbaike272%2C5%2C5%2C272%2C90/sign=5434855adf62853586edda73f1861da3/48540923dd54564e5d3c1b91b9de9c82d1584f39.jpg">
                                    </div>
                                    <div>
                                        <table>
                                            <tr>
                                                <td colspan="2" title="100楼吊着呢，帮忙递根烟，小苏就行。">100楼吊着，帮忙递根烟，小苏就行。</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">发布时间: <span>2018/02/02</span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-5 col-xs-6 g-taskItem">
                                <div class="z2 z3">
                                    <div>
                                        <img src="https://gss3.bdstatic.com/7Po3dSag_xI4khGkpoWK1HF6hhy/baike/c0%3Dbaike272%2C5%2C5%2C272%2C90/sign=5434855adf62853586edda73f1861da3/48540923dd54564e5d3c1b91b9de9c82d1584f39.jpg">
                                    </div>
                                    <div>
                                        <table>
                                            <tr>
                                                <td colspan="2" title="100楼吊着呢，帮忙递根烟，小苏就行。">100楼吊着，帮忙递根烟，小苏就行。</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">发布时间: <span>2018/02/02</span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-5 col-xs-6 g-taskItem">
                                <div class="z2 z3">
                                    <div>
                                        <img src="https://gss3.bdstatic.com/7Po3dSag_xI4khGkpoWK1HF6hhy/baike/c0%3Dbaike272%2C5%2C5%2C272%2C90/sign=5434855adf62853586edda73f1861da3/48540923dd54564e5d3c1b91b9de9c82d1584f39.jpg">
                                    </div>
                                    <div>
                                        <table>
                                            <tr>
                                                <td colspan="2" title="100楼吊着呢，帮忙递根烟，小苏就行。">100楼吊着，帮忙递根烟，小苏就行。</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">发布时间: <span>2018/02/02</span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="space-10"></div>
            <div class="clearfix">
                <div class="col-sm-12 m-task col-left col-right">
                    <div class="clearfix txc">
                        <h4 class="text-size24 cor-gray45">推荐产品</h4>
                        {{--<a class="pull-right cor-gray97 u-more" href="/task" target="_blank">More></a>--}}
                    </div>
                    <div class="space-4"></div>
                    <div class="g-taskleft b-border clearfix">
                        <div class="space"></div>
                        <ul class=" clearfix text-size14 m-homelist cor-grayC2 mg-margin col-sm-12">
                            <li class="col-md-4 col-sm-5 col-xs-6 g-taskItem">
                                <div class="z2 z3">
                                    <div>
                                        <img src="https://gss3.bdstatic.com/7Po3dSag_xI4khGkpoWK1HF6hhy/baike/c0%3Dbaike272%2C5%2C5%2C272%2C90/sign=5434855adf62853586edda73f1861da3/48540923dd54564e5d3c1b91b9de9c82d1584f39.jpg">
                                    </div>
                                    <div>
                                        <table>
                                            <tr>
                                                <td colspan="2" title="100楼吊着呢，帮忙递根烟，小苏就行。">100楼吊着，帮忙递根烟，小苏就行。</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">发布时间: <span>2018/02/02</span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-5 col-xs-6 g-taskItem">
                                <div class="z2 z3">
                                    <div>
                                        <img src="https://gss3.bdstatic.com/7Po3dSag_xI4khGkpoWK1HF6hhy/baike/c0%3Dbaike272%2C5%2C5%2C272%2C90/sign=5434855adf62853586edda73f1861da3/48540923dd54564e5d3c1b91b9de9c82d1584f39.jpg">
                                    </div>
                                    <div>
                                        <table>
                                            <tr>
                                                <td colspan="2" title="100楼吊着呢，帮忙递根烟，小苏就行。">100楼吊着，帮忙递根烟，小苏就行。</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">发布时间: <span>2018/02/02</span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-5 col-xs-6 g-taskItem">
                                <div class="z2 z3">
                                    <div>
                                        <img src="https://gss3.bdstatic.com/7Po3dSag_xI4khGkpoWK1HF6hhy/baike/c0%3Dbaike272%2C5%2C5%2C272%2C90/sign=5434855adf62853586edda73f1861da3/48540923dd54564e5d3c1b91b9de9c82d1584f39.jpg">
                                    </div>
                                    <div>
                                        <table>
                                            <tr>
                                                <td colspan="2" title="100楼吊着呢，帮忙递根烟，小苏就行。">100楼吊着，帮忙递根烟，小苏就行。</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">发布时间: <span>2018/02/02</span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="space-10"></div>
        </div>
    </div>
</section>
<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 g-address col-left">
                    <div>
                        <a target="_blank" href="/article/aboutUs/29">关于我们</a>
                        <span></span>
                        <a target="_blank" href="/article/aboutUs/30">服务条款</a>
                        <span></span>
                        <a target="_blank" href="/article/aboutUs/31">帮助中心</a>
                        <span></span>
                        <a target="_blank" href="/article/aboutUs/39">空间规则</a>
                        <span></span>
                    </div>
                    <div class="space-6"></div>
                    <p class="cor-gray87">地址：武汉市洪山区珞瑜路786号9层</p>
                    <p class="cor-gray87 kppw-tit">
                        Powered by <a href="http://www.kppw.cn" target="_blank">KPPW</a>3.0
                        copyright 2015-2025 kppw.cn 版权所有
                    </p>
                </div>
                <div class="col-lg-3 g-contact visible-lg-block hidden-sm hidden-md hidden-xs">
                    <div class="cor-gray71 text-size14 g-contacthd"><span>联系方式</span></div>
                    <div class="space-6"></div>
                    <p class="cor-gray97">服务热线：027-87733922</p>
                    <p class="cor-gray97">Email：vip@kppw.com</p>
                </div>
                <div class="col-lg-3 focusus visible-lg-block hidden-sm hidden-md hidden-xs col-left">
                    <div class="cor-gray71 text-size14 focusushd"><span>微信号</span></div>
                    <div class="space-8"></div>
                    <div class="clearfix">
                        <div class="foc foc-bg">
                            <a class="focususwx foc-wx" href=""></a>
                            <div class="foc-ewm">
                                <div class="foc-ewm-arrow1"></div>
                                <div class="foc-ewm-arrow2"></div>
                                <img src="http://localhost:8000/attachment/sys/9d964f8f9e9cec692e02e9d532ed2068.png"
                                     alt="" width="100" height="100">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="/asset/web/plugins/jquery/jquery.min.js"></script>
<script src="/asset/web/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/asset/web/js/nav.js"></script>
<script src="/asset/web/js/common.js"></script>
<script src="/asset/web/plugins/jquery/superSlide/jquery.SuperSlide.2.1.1.js"></script>
<script src="/asset/web/plugins/jquery/adaptive-backgrounds/jquery.adaptive-backgrounds.js"></script>
<script src="/asset/web/plugins/ace/js/jquery.gritter.min.js"></script>
<script src="/asset/web/js/doc/homepage.js"></script>
<script src="/asset/web/js/doc/layer.js"></script>
</body>