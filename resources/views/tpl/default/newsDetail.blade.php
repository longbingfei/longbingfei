@include('tpl.default.header')
<link rel="stylesheet" href="/asset/web/css/blue/user.css">
<link media="all" type="text/css" rel="stylesheet" href="/asset/web/css/usercenter/usercenter.css">
<section>
    <div class="container">
        <div class="row" style="margin-bottom: 20px">
            <div class="g-taskposition col-lg-12 col-left">您的位置：<a href="/">首页</a> > 资讯</div>
            <div class="col-lg-12 g-side2 martop20 col-left">
                <div class="space-10"></div>
                <div class="g-userhint g-userlist tabbable">
                    <div class="tab-content">
                        @if($news)
                            <h1 style="text-align: center">{{$news->title}}</h1>
                            <h6 style="text-align: right;padding-right:10px;">{{$news->created_at}}</h6>
                            <div style="padding:10px;margin-top: 20px;">{!! urldecode($news->content) !!}</div>
                        @else
                            <h2 style="padding:10px;text-align: center">资讯不存在!</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('tpl.default.footer')