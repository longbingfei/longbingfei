@include('tpl.default.header')
<link rel="stylesheet" href="/asset/web/css/blue/user.css">
<link media="all" type="text/css" rel="stylesheet" href="/asset/web/css/usercenter/usercenter.css">
<section>
    <div class="container">
        <div class="row" style="margin-bottom: 20px">
            <div class="g-taskposition col-lg-12 col-left">您的位置：<a href="/">首页</a> > 管理中心</div>
            <div class="col-lg-12 g-side2 martop20 col-left">
                <div class="space-10"></div>
                <div class="g-userhint g-userlist tabbable">
                    <div class="clearfix g-userlisthead">
                        <ul class="pull-left text-size16 nav nav-tabs">
                            <li class="a1"><a class="click_1" href="/admin_user" target="nnn">用户管理</a></li>
                            <div class="pull-left">|</div>
                            <li class="a2"><a href="/admin_need" target="nnn">需求管理</a></li>
                            <div class="pull-left">|</div>
                            <li class="a3"><a href="/admin_company" target="nnn">厂家管理</a></li>
                            <div class="pull-left">|</div>
                            <li class="a5"><a href="/c_sort" target="nnn">厂家分类管理</a></li>
                            <div class="pull-left">|</div>
                            <li class="a4"><a href="/admin_prd" target="nnn">产品管理</a></li>
                            <div class="pull-left">|</div>
                            <li class="a5"><a href="/admin_news" target="nnn">资讯管理</a></li>
                            <div class="pull-left">|</div>
                            <li class="a5"><a href="/admin_net" target="nnn">网站管理</a></li>
                        </ul>
                    </div>
                    <div class="tab-content niconico">
                        <iframe class="admin_wrap" name="nnn" src="/admin_user"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('tpl.default.footer')