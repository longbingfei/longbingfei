@extends('admin.home')
@section('title','控制台')
@section('link')
    @parent
@stop
@section('stylesheet')
    @parent
@stop
@section('nav')
    @parent
@stop
@section('subject','控制台')
@section('body')
    <div class="control-container">
        <div class="panel panel-info">
            <div class="panel-heading">前台布局</div>
            <div class="panel-body">
                <div class="list-group-item">
                    <h4 class="list-group-item-heading">轮播</h4>
                    <p class="list-group-item-text">1233</p>
                </div>
                <div class="list-group-item">
                    <h4 class="list-group-item-heading">推荐</h4>
                    <p class="list-group-item-text">1233</p>
                </div>
                <div class="list-group-item">
                    <h4 class="list-group-item-heading">动态</h4>
                    <p class="list-group-item-text">1233</p>
                </div>
            </div>
        </div>
        {{--<div class="panel panel-info">--}}
            {{--<div class="panel-heading">数据统计</div>--}}
            {{--<div class="panel-body">--}}
                {{--<table class="table table-hover">--}}
                    {{--<tr>--}}
                        {{--<td>今日点击量</td>--}}
                        {{--<td>100</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>日均点击量</td>--}}
                        {{--<td>100</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>累计点击量</td>--}}
                        {{--<td>100</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>文章总数</td>--}}
                        {{--<td>100</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>商品总数</td>--}}
                        {{--<td>122</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>管理账号数</td>--}}
                        {{--<td>2</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>最后操作人</td>--}}
                        {{--<td>sign</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>最后操作时间</td>--}}
                        {{--<td>2010-10-10 10:10:10</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>系统信息</td>--}}
                        {{--<td>ubuntu15 3GB 10GB</td>--}}
                    {{--</tr>--}}
                {{--</table>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    <script>
        $("tr").click(function () {
            var form = $("<div>" +
                    '当前轮播' +
                    '<img src="https://www.baidu.com/img/bd_logo1.png">' +
                    '更换轮播' +
                    '<select>' +
                    '<option>123</option>' +
                    '</select>' +
                    "</div>"
            ).css('display', 'none');
            $(this).after(form).children('div').slideDown();
        });
    </script>
@stop
