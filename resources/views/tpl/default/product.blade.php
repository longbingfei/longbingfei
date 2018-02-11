@include('tpl.default.header')
<section>
    <div class="container">
        <div class="row">
            <div class="g-taskposition col-lg-12 col-left">您的位置：<a href="/">首页</a> > 产品</div>
            <div class="col-lg-12 col-left">
                <div class="g-taskprocess hidden-xs">
                    <div class="row">
                        <div class="col-md-4 col-xs-4">
                            <div class="g-taskpro1 pull-left"><span>定位所需产品</span>
                                <p>搜索产品</p></div>
                            <div class="g-taskproico1 pull-right">></div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <div class="g-taskpro2 pull-left"><span>联系厂家</span>
                                <p>厂家提供解决方案</p></div>
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
                                <div class="col-lg-1 cor-gray51 text-size14 col-sm-2 col-xs-12">产品类型</div>
                                <div class="col-lg-11 col-sm-10  col-xs-12">
                                    <a class="bg-blue" href="">1</a>
                                    <a class="" href="">2</a>
                                    <a class="" href="">3</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 clearfix task-type">
                            <div class="row">
                                <div class="col-lg-1 cor-gray51 text-size14 col-sm-2 col-xs-12">发布区域</div>
                                <div class="col-lg-11 col-sm-10  col-xs-12">
                                    北京
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="g-taskmain">
                    <div class="clearfix g-taskmainhd">
                        <div class="pull-left">
                            <a class="g-taskmact" href="">默认</a><span>|</span>
                            <a class=" g-taskmaintime" href="">发布时间</a><span>|</span>
                            <a class="" href="">热度</a>
                        </div>
                    </div>
                    @if(empty($data))
                        <div style="height:50px;padding-left: 10px;line-height: 50px;">
                            暂无相关数据
                        </div>
                    @else
                        <ul class="g-taskmainlist js1">
                            @foreach($data as $vo)
                                <li class="clearfix z9 z10">
                                    <p><img src="{{$vo['cover']}}"></p>
                                    <p class="ecli"><a href="/prd/{{$vo['id']}}">{{$vo['name']}}</a></p>
                                    <p>{{$vo['price']}}</p>
                                    <p>
                                        <span>{{Date('Y/m/d',strtotime($vo['created_at']))}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span>关注<b style="color:darkolivegreen">({{$vo['fork']}})</b></span>
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="space-20"></div>
            </div>
        </div>
    </div>
</section>
@include('tpl.default.footer')