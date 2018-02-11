@include('tpl.default.header')
<section>
    <div class="container">
        <div class="row">
            <div class="g-taskposition col-lg-12 col-left">您的位置：<a href="/">首页</a> > 需求</div>
            <div class="col-lg-12 col-left">
                <div class="g-taskprocess hidden-xs">
                    <div class="row">
                        <div class="col-md-4 col-xs-4">
                            <div class="g-taskpro1 pull-left"><span>免费发布需求</span>
                                <p>免费发布</p></div>
                            <div class="g-taskproico1 pull-right">></div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <div class="g-taskpro2 pull-left"><span>厂家投标</span>
                                <p>众多企业，技术前沿</p></div>
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
                                <div class="col-lg-1 cor-gray51 text-size14 col-sm-2 col-xs-12">需求类型</div>
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
                        <div class="col-xs-12 clearfix task-type">
                            <div class="row">
                                <div class="col-lg-1 cor-gray51 text-size14 col-sm-2 col-xs-12">项目周期</div>
                                <div class="col-lg-11 col-sm-10  col-xs-12">
                                    111
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 clearfix">
                            <div class="row">
                                <div class="col-lg-1 col-sm-2 col-md-2 cor-gray51 text-size14 col-xs-12">需求状态</div>
                                <div class="col-lg-11 col-sm-10 col-md-10 col-xs-12">
                                    <a class="bg-blue" href="">全部</a>
                                    <a href="">报名中</a>
                                    <a href="">线下对接中</a>
                                    <a href="">已结束</a>
                                    <a href="">流标</a>
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
                    @if(!collect($data)->toArray()['total'])
                        <div style="height:50px;padding-left: 10px;line-height: 50px;">
                            暂无相关数据
                        </div>
                    @else
                        <ul class="g-taskmainlist">
                            @foreach($data as $vo)
                                <li class="clearfix zz1">
                                    <div class="row zz">
                                        <div class="col-lg-9 col-sm-8">
                                            <div class="text-size16">
                                                <a href="need/{{$vo->id}}">
                                                    <b>{{$vo->title}}</b>
                                                </a>
                                            </div>
                                            <div class="z4">
                                                <p>
                                                    <span>{{$vo->budget}}</span>
                                                    <span>预算金额</span>
                                                </p>
                                                <p>
                                                    <span>{{$vo->fork}}</span>
                                                    <span>报名人数</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="cor-gray87 text-size14 pull-up hidden-xs col-lg-3 col-sm-4">
                                            <div class="z5">
                                                <a href="need/{{$vo->id}}">查看详情</a>
                                            </div>
                                        </div>
                                        <div class="z6">
                                            <span title="需求类型"><i class="glyphicon glyphicon-th-large"></i> <span
                                                        class="info">计算机编程</span></span>
                                            <span title="发布地址"><i class="glyphicon glyphicon-map-marker"></i> <span
                                                        class="info">洛阳市</span></span>
                                            <span title="发布时间"><i class="glyphicon glyphicon-time"></i> <span
                                                        class="info">{{Date('Y-m-d',strtotime($vo->created_at))}}</span></span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {!! $data->render() !!}
                    @endif
                </div>
                <div class="space-20"></div>
            </div>
        </div>
    </div>
</section>
@include('tpl.default.footer')