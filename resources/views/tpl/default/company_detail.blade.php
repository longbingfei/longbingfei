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