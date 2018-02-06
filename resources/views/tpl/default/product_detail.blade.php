@include('tpl.default.header')
<section>
    <div class="container">
        <div class="row">
            <div class="shop-wrap clearfix">
                <div class="col-sm-12 col-left">
                    <div class="shop-main">
                        <div class="personal-info">
                            @if(isset($bg) && $bg)
                                <img src="/asset/web/image/logo.png" name="" class="personal-info-back-pic">
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
                                        <h3 class="text-size20 cor-gray51">华为科技有限公司南京分111公司</h3>
                                    </div>
                                    <p class="hidden-xs cor-gray51">地&nbsp;&nbsp;&nbsp;址：&nbsp;</p>
                                    <p class="personal-tag hidden-xs cor-gray51">分&nbsp;&nbsp;&nbsp;类：&nbsp;
                                        <span class="cor-gray87">程序开发</span>
                                        <span class="cor-gray87">软件皮肤</span>
                                        <span class="cor-gray87">插件开发</span>
                                    </p>
                                    <p class="personal-tag hidden-xs cor-gray51">经营范围：&nbsp;
                                        <span class="cor-gray87">1111</span>
                                        <span class="cor-gray87">2222</span>
                                        <span class="cor-gray87">3333333</span>
                                    </p>
                                    <p class="hidden-xs cor-gray51">企业联系人:</p>
                                    <p class="hidden-xs cor-gray51">企业联系方式:</p>
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
                                    <td>四轴焊接机器人</td>
                                </tr>
                                <tr>
                                    <td>价格:</td>
                                    <td>100000</td>
                                </tr>
                                <tr>
                                    <td>月销量:</td>
                                    <td>200</td>
                                </tr>
                                <tr>
                                    <td>库存:</td>
                                    <td>999</td>
                                </tr>
                                <tr>
                                    <td>关注数:</td>
                                    <td>100</td>
                                </tr>
                            </table>
                        </div>
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
        images: '[{"name":"0058d12913ed20be34bc06cd22e3a6cd0","sort_id":3,"path":"default\\/images\\/gallery1.jpeg","thumb":"default\\/images\\/gallery1.jpeg","user_id":"1","updated_at":"2018-02-06 10:40:42","created_at":"2018-02-06 10:40:42","id":19},{"name":"timg","sort_id":3,"path":"default\\/images\\/gallery2.jpeg","thumb":"default\\/images\\/gallery2.jpeg","user_id":"1","updated_at":"2018-02-06 10:41:27","created_at":"2018-02-06 10:41:27","id":21}]',
        payload: $('.img-roll'),
        host: "http://localhost:8000/"
    });
</script>