@include('tpl.default.header')

<section>
    <div class="container">
        <div class="row">
            <div class="g-taskposition col-lg-12 col-left">您的位置：<a href="/">首页</a> > 厂家</div>
            <div class="col-lg-12 col-left">
                <div class="g-taskprocess hidden-xs">
                    <div class="row">
                        <div class="col-md-4 col-xs-4">
                            <div class="g-taskpro1 pull-left"><span>免费发布产品</span>
                                <p>免费发布</p></div>
                            <div class="g-taskproico1 pull-right">></div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <div class="g-taskpro2 pull-left"><span>客户选择</span>
                                <p>众多客源，优质客户</p></div>
                            <div class="g-taskproico2 pull-right">></div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <div class="g-taskpro3"><span>担保交易</span>
                                <p>担保交易，满意付款</p></div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="g-taskclassify clearfix  table-responsive">
                        <div class="col-xs-12 clearfix task-type">
                            <div class="row">
                                <div class="col-lg-1 cor-gray51 text-size14 col-sm-2 col-xs-12">厂家分类</div>
                                <div class="col-lg-11 col-sm-10  col-xs-12">
                                    <a class="bg-blue" href="">1</a>
                                    <a class="" href="">2</a>
                                    <a class="" href="">3</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 clearfix task-type">
                            <div class="row">
                                <div class="col-lg-1 cor-gray51 text-size14 col-sm-2 col-xs-12">所在地区</div>
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
                            <a class=" g-taskmaintime" href="">浏览量</a><span>|</span>
                            <a class="" href="">入驻时间</a>
                        </div>
                    </div>
                    @if(empty($data))
                        <div style="height:50px;padding-left: 10px;line-height: 50px;">
                            暂无相关数据
                        </div>
                    @else
                        <ul class="g-taskmainlist js1">
                            @foreach($data as $vo)
                                <li class="clearfix z9">
                                    <p>
                                        <img src="{{$vo->logo}}">
                                    </p>
                                    <p class="ecli"><a href="/company/{{$vo->id}}">{{$vo->company_name}}</a></p>
                                    <p>{{$vo->operate_ids}}</p>
                                    <p style="text-align: center"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i></p>
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