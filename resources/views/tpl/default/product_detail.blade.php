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
                                        <h3 class="text-size20 cor-gray51">{{$data->company->company_name}}</h3>
                                    </div>
                                    <p class="hidden-xs cor-gray51">
                                        地&nbsp;&nbsp;&nbsp;址：&nbsp;{{$data->company->address}}</p>
                                    <p class="personal-tag hidden-xs cor-gray51">分&nbsp;&nbsp;&nbsp;类：&nbsp;
                                        @foreach($data->company->sort_ids as $vo)
                                            <span class="cor-gray87">{{$vo}}</span>
                                        @endforeach
                                    </p>
                                    <p class="personal-tag hidden-xs cor-gray51">经营范围：&nbsp;
                                        @foreach($data->company->operate_ids as $v)
                                            <span class="cor-gray87">{{$v}}</span>
                                        @endforeach
                                    </p>
                                    <p class="hidden-xs cor-gray51">企业联系人: {{$data->company->name}}</p>
                                    <p class="hidden-xs cor-gray51">企业联系方式: {{$data->company->tel}}</p>
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
                                    <td>月销量:</td>
                                    <td>200</td>
                                </tr>
                                <tr>
                                    <td>库存:</td>
                                    <td>{{$data->storage}}</td>
                                </tr>
                                <tr>
                                    <td>关注数:</td>
                                    <td>{{$data->fork}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-left">
                    <h2>商品描述</h2>
                    <div style=" border:1px solid grey;min-height:200px;padding:10px;">
                        {!! $data->describe !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('tpl.default.footer')
<script>
    //p详情轮播
    $.Carousel.init({
        images: '{!! $data->images ?: '[{"path":"/asset/web/image/need_default1.jpg","thumb":"/asset/web/image/need_default1.jpg"},{"path":"/asset/web/image/need_default2.jpg","thumb":"/asset/web/image/need_default2.jpg"}]' !!}',
        payload: $('.img-roll')
    });
</script>