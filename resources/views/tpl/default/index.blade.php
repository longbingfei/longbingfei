@include('tpl.default.header')
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
                        <img src="{{$c_images[0]}}" style="height:460px !important;" class="img-responsive itm-banner"
                             data-adaptive-background='1'>
                    </div>
                </a>
            </div>
            @foreach($c_images as $k => $v)
                @if($k > 0)
                    <div class="item item-banner1">
                        <a href="javascript:;">
                            <div>
                                <img src="{{$v}}" style="height:460px !important;" class="img-responsive itm-banner"
                                     data-adaptive-background='{{$k+1}}'>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
            <div class="item item-banner1">
                <a href="javascript:;">
                    <div>
                        <img src="{{$c_images[0]}}" style="height:460px !important;" class="img-responsive itm-banner"
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
                                <img src="{{$c_images[0]}}" style="height:260px !important;" class="img-responsive">
                            </a>
                        </div>
                        @foreach($c_images as $k => $v)
                            @if($k > 0)
                                <div class="item">
                                    <a href="javascript:;">
                                        <img src="{{$v}}" style="height:260px !important;" class="img-responsive">
                                    </a>
                                </div>
                            @endif
                        @endforeach
                        <div class="item">
                            <a href="javascript:;">
                                <img src="{{$c_images[0]}}" style="height:260px !important;" class="img-responsive">
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
                            <p class="cor-gray97">万千厂家为您出谋划策</p>
                        </div>
                    </div>
                    <div class="col-md-3 s-ico s-ico2">
                        <div class="pull-right">
                            <h4 class="text-size16 cor-gray51">找需求</h4>
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
                            @if(!empty($new_needs))
                                @foreach($new_needs as $vo)
                            <li class="col-md-4 col-sm-5 col-xs-6">
                                <div class="z1">
                                    <table>
                                        <tr>
                                            <td colspan="2" title="{{$vo['title']}}"><a href="/need/{{$vo['id']}}" target="_blank">{{$vo['title']}}</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">预算: {{$vo['budget']?:'面议'}}</td>
                                        </tr>
                                    </table>
                                    <div>
                                        <span title="发布地址"><i class="glyphicon glyphicon-map-marker"></i> <span
                                                    class="info" title="{{$vo['city_name']}}">{{$vo['city_name']}}</span></span>
                                        <span title="报名人数"><i class="glyphicon glyphicon-user"></i> <span class="info">{{$vo['baoming_count']}}</span></span>
                                        <span title="发布时间"><i class="glyphicon glyphicon-time"></i> <span class="info">{{Date('Y/m/d',strtotime($vo['created_at']))}}</span></span>
                                    </div>
                                </div>
                            </li>
                                @endforeach
                            @endif
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
                            @if(!empty($promote_needs))
                                @foreach($promote_needs as $vo)
                                    <li class="col-md-4 col-sm-5 col-xs-6">
                                        <div class="z1">
                                            <table>
                                                <tr>
                                                    <td colspan="2" title="{{$vo['title']}}"><a href="/need/{{$vo['id']}}" target="_blank">{{$vo['title']}}</a></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">预算: {{$vo['budget']?:'面议'}}</td>
                                                </tr>
                                            </table>
                                            <div>
                                        <span title="发布地址"><i class="glyphicon glyphicon-map-marker"></i> <span
                                                    class="info" title="{{$vo['city_name']}}">{{$vo['city_name']}}</span></span>
                                                <span title="报名人数"><i class="glyphicon glyphicon-user"></i> <span class="info">{{$vo['baoming_count']}}</span></span>
                                                <span title="发布时间"><i class="glyphicon glyphicon-time"></i> <span class="info">{{Date('Y/m/d',strtotime($vo['created_at']))}}</span></span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
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
                            @if(!empty($new_companys))
                                @foreach($new_companys as $vo)
                                    <li class="col-md-4 col-sm-5 col-xs-6 g-taskItem">
                                        <div class="z2">
                                            <div>
                                                <img src="{{$vo['logo']?:'/asset/web/image/kabuki.jpg'}}" alt="logo">
                                            </div>
                                            <div>
                                                <table>
                                                    <tr>
                                                        <td colspan="2" title="{{$vo['company_name']}}"><a href="/company/{{$vo['id']}}" target="_blank">{{$vo['company_name']}}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">总评: <i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                    class="fa fa-star"></i><i class="fa fa-star"></i></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
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
                            @if(!empty($promote_companys))
                                @foreach($promote_companys as $vo)
                                    <li class="col-md-4 col-sm-5 col-xs-6 g-taskItem">
                                        <div class="z2">
                                            <div>
                                                <img src="{{$vo['logo']?:'/asset/web/image/kabuki.jpg'}}" alt="logo">
                                            </div>
                                            <div>
                                                <table>
                                                    <tr>
                                                        <td colspan="2" title="{{$vo['company_name']}}"><a href="/company/{{$vo['id']}}" target="_blank">{{$vo['company_name']}}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">总评: <i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                    class="fa fa-star"></i><i class="fa fa-star"></i></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
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
                            @if(!empty($new_prds))
                                @foreach($new_prds as $vo)
                                    <li class="col-md-4 col-sm-5 col-xs-6 g-taskItem">
                                        <div class="z2 z3">
                                            <div>
                                                <img src="{{$vo['logo']}}">
                                            </div>
                                            <div>
                                                <table>
                                                    <tr>
                                                        <td colspan="2" title="{{$vo['name']}}">{{$vo['name']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">发布时间: <span>{{Date('Y/m/d',strtotime($vo['created_at']))}}</span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
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
                            @if(!empty($promote_prds))
                                @foreach($promote_prds as $vo)
                                    <li class="col-md-4 col-sm-5 col-xs-6 g-taskItem">
                                        <div class="z2 z3">
                                            <div>
                                                <img src="{{$vo['logo']}}">
                                            </div>
                                            <div>
                                                <table>
                                                    <tr>
                                                        <td colspan="2" title="{{$vo['name']}}">{{$vo['name']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">发布时间: <span>{{Date('Y/m/d',strtotime($vo['created_at']))}}</span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="space-10"></div>
        </div>
    </div>
</section>
@include('tpl.default.footer')