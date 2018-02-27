@include('tpl.default.header')
<section>
    <div class="container">
        <div class="row">
            <div class="shop-wrap clearfix">
                <div class="col-sm-12 col-left">
                    <div class="shop-main">
                        <div class="personal-info">
                            @if($data->company->image)
                                <img src="{{$data->company->image}}" name="" class="personal-info-back-pic">
                            @else
                                <img src="/asset/web/image/bg_cp.jpg" name="" class="personal-info-back-pic">
                            @endif
                            <div class="personal-info-words">
                                @if($data->company->logo)
                                    <img src="{{$data->company->logo}}" alt="" class="img-circle personal-info-pic">
                                @else
                                    <img src="/asset/web/image/kabuki.jpg" alt="" class="img-circle personal-info-pic">
                                @endif
                                <div class="personal-info-block">
                                    <div class="personal-info-block-name">
                                        <h3 class="text-size20 cor-gray51"><a
                                                    href="/company/{{$data->company->id}}">{{$data->company->company_name}}</a>
                                        </h3>
                                    </div>
                                    <p class="hidden-xs cor-gray51">
                                        地&nbsp;&nbsp;&nbsp;址：&nbsp;{{$data->company->city}} {{$data->company->address}}</p>
                                    <p class="personal-tag hidden-xs cor-gray51">分&nbsp;&nbsp;&nbsp;类：&nbsp;
                                        @foreach($data->company->sort_ids as $vo)
                                            <span class="cor-gray87">{{isset($data->city_value[$vo]) ? $data->city_value[$vo]: ''}}</span>
                                        @endforeach
                                    </p>
                                    <p class="personal-tag hidden-xs cor-gray51">经营范围：&nbsp;
                                        @foreach($data->company->operate_ids as $v)
                                            <span class="cor-gray87">{{$v}}</span>
                                        @endforeach
                                    </p>
                                    <p class="hidden-xs cor-gray51">企业联系人: {{$data->company->name}}</p>
                                    <p class="hidden-xs cor-gray51">企业联系方式: {{$data->company->tel}}</p>
                                    <p class="hidden-xs cor-gray51" style="display: inline-block">企业联系方式: {{$data->company->tel}}</p>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <p class="hidden-xs cor-gray51" style="display: inline-block">企业QQ: {{$data->company->qq}}</p>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <p class="hidden-xs cor-gray51" style="display: inline-block">企业微信: {{$data->company->wechat}}</p>&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-left" style="margin-top: 10px;">
                    <h2>商品详情</h2>
                    <div class="p_main">
                        <div class="img-roll"></div>
                        <div class="img-info">
                            <table class="itb">
                                <tr>
                                    <td>品名:</td>
                                    <td>{{$data->name}}</td>
                                </tr>
                                <tr>
                                    <td>价格:</td>
                                    <td>{{$data->price}}</td>
                                </tr>
                                <tr>
                                    <td>电话:</td>
                                    <td>{{$data->company->tel}}</td>
                                </tr>
                                <tr>
                                    <td>地址:</td>
                                    <td>{{$data->company->city}} {{$data->company->address}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-left">
                    <h2>商品描述</h2>
                    <div style=" border:1px solid grey;padding:10px;">
                        {!! urldecode($data->describe) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('tpl.default.footer')
<script>
    //p详情轮播
    @if($data->images)
        $.Carousel.init({
            images: '{!! $data->images !!}',
            payload: $('.img-roll')
        });
    @endif
</script>