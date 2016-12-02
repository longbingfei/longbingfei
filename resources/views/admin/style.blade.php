@extends('admin.home')
@section('title','应用列表')
@section('link')
    @parent
@stop
@section('stylesheet')
    @parent
@stop
@section('nav')
    @parent
@stop
@section('subject','应用列表')
@section('body')
    <div class="app-container">
        <ul>
            <li data-appinfo="文稿"><a class="glyphicon glyphicon-file" href="{{url('admin/feature/article')}}"
                                     onclick="return checkpermission('article-list')"></a></li>
            <li data-appinfo="商品"><a class="glyphicon glyphicon-shopping-cart" href="{{url('admin/feature/product')}}"
                                     onclick="return checkpermission('product-list')"></a></li>
            <li data-appinfo="权限"><a class="glyphicon glyphicon-user" href="{{url('admin/auth/list')}}"
                                     onclick="return checkpermission('user-list')"></a></li>
            <li data-appinfo="图片"><a class="glyphicon glyphicon-picture" href="{{url('admin/feature/image')}}"
                                     onclick="return checkpermission('image-list')"></a></li>
            <li data-appinfo="视频"><a class="glyphicon glyphicon-facetime-video"></a></li>
            <li data-appinfo="日历"><a class="glyphicon glyphicon-calendar"></a></li>
            <li data-appinfo="标签"><a class="glyphicon glyphicon-tags"></a></li>
            <li data-appinfo="日志"><a class="glyphicon glyphicon-th-list"></a></li>
            <li data-appinfo="设置"><a class="glyphicon glyphicon-cog"></a></li>
            <li data-appinfo="分享"><a class="glyphicon glyphicon-send"></a></li>
        </ul>
    </div>
    <script>
        //app图标显示样式
        $('.app-container ul li').hover(function () {
            if ($(this).find('.app-cover-div').length) {
                return false;
            }
            $(this).children('a').css({color: '#00AA88'});
            var appinfo = $(this).data('appinfo');
            var coverDiv = $('<div>' + appinfo + '</div>').addClass('app-cover-div');
            $(this).append(coverDiv);
            $(this).find('.app-cover-div').stop(1, 1).animate({bottom: '0px'});
        }, function () {
            $(this).children('a').css({color: '#FFFFFF'});
            $(this).find('.app-cover-div').stop(1, 1).animate({bottom: '-100px'}, function () {
                $(this).remove();
            });
        });
        $("li").click(function () {
            $(this).children('a')[0].click();
        });
    </script>
@stop
