@include('tpl.default.header')
<section>
    <div class="container">
        <div class="row">
            <div class="shop-wrap clearfix">
                <div class="col-sm-12 col-left">
                    <div class="shop-main">
                        <div class="personal-info">
                            @if($data->image)
                                <img src="{{$data->image}}" name="" class="personal-info-back-pic">
                            @else
                                <img src="/asset/web/image/bg_cp.jpg" name="" class="personal-info-back-pic">
                            @endif
                            <div class="personal-info-words">
                                @if(isset($bg) && $bg)
                                    <img src="/asset/web/image/kabuki.jpg" alt="" class="img-circle personal-info-pic">
                                @else
                                    <img src="/asset/web/image/kabuki.jpg" alt="" class="img-circle personal-info-pic">
                                @endif
                                <div class="personal-info-block">
                                    <div class="personal-info-block-name">
                                        <h3 class="text-size20 cor-gray51">{{$data->company_name}}</h3>
                                    </div>
                                    <p class="hidden-xs cor-gray51">所在地：&nbsp;{{$data->city}}</p>
                                    <p class="hidden-xs cor-gray51">详细地址：&nbsp;{{$data->address}}</p>
                                    <p class="personal-tag hidden-xs cor-gray51">分&nbsp;&nbsp;&nbsp;类：&nbsp;
                                        @foreach($data->sort_ids as $vo)
                                            <span class="cor-gray87">{{$vo}}</span>
                                        @endforeach
                                    </p>
                                    <p class="personal-tag hidden-xs cor-gray51">经营范围：&nbsp;
                                        @foreach($data->operate_ids as $vo)
                                            <span class="cor-gray87">{{$vo}}</span>
                                        @endforeach
                                    </p>
                                    <p class="hidden-xs cor-gray51">企业联系人: {{$data->name}}</p>
                                    <p class="hidden-xs cor-gray51">企业联系方式: {{$data->tel}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="shop-casewrap row">
                        <div class="col-md-12 col-left">
                            <div class="shop-evaluate">
                                <div class="shop-evalhd clearfix">
                                    <h4 class="pull-left text-size20">企业简介</h4>
                                </div>
                                <div class="clearfix ">
                                    <div class="col-sm-1 col-xs-2">
                                        <div class="row">
                                            {{$data->describe}}
                                        </div>
                                    </div>
                                    <div class="space"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-left">
                    <div class="shop-wares">
                        <div class="shop-evalhd clearfix">
                            <h4 class="pull-left text-size20">产品</h4>
                        </div>
                        <div class="shop-mainlistwrap">
                            <ul class="row shop-mainlist">
                                <li class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="shop-mainimg shop-mainimg234">
                                        <a href="/product/1"> <img src="/asset/web/image/jp_head_bg.jpg"></a>
                                    </div>
                                    <div class="shop-maininfo">
                                        <h5 class="text-size14 cor-gray51 p-space"><a href="/product/1">PHP小站</a></h5>
                                        <div class="space-6"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('tpl.default.footer')