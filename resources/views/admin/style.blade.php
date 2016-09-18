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
                <table class="table table-hover">
                    <tr>
                        <td>轮播设置</td>
                        <td>发发发</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>动态设置</td>
                        <td>嘻嘻嘻</td>
                    </tr>
                    <tr>
                        <td>推荐设置</td>
                        <td>反反复复</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">数据统计</div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tr>
                        <td>今日点击量</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>日均点击量</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>累计点击量</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>文章总数</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>商品总数</td>
                        <td>122</td>
                    </tr>
                    <tr>
                        <td>管理账号数</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>最后操作人</td>
                        <td>sign</td>
                    </tr>
                    <tr>
                        <td>最后操作时间</td>
                        <td>2010-10-10 10:10:10</td>
                    </tr>
                    <tr>
                        <td>系统信息</td>
                        <td>ubuntu15 3GB 10GB</td>
                    </tr>
                </table>
            </div>
        </div>
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
            );
            $(this).after(form);
        });
    </script>
@stop
