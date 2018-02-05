@include('tpl.default.header')
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
@include('tpl.default.footer')