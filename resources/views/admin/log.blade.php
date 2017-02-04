@extends('admin.base')
@section('title','日志')
@section('link')
    @parent
@stop
@section('stylesheet')
    @parent
@stop
@section('nav')
    @parent
@stop
@section('subject','日志列表')
@section('body')
    @parent
    <div class="container">
        <div>
            <table class="table table-hover">
                <tr class="active">
                    <td>选择</td>
                    <td>内容</td>
                    <td>操作类型</td>
                    <td>应用名称</td>
                    <td>操作时间</td>
                    <td>用户</td>
                    <td>还原</td>
                </tr>
                @if(!$data['total'])
                    <tr>
                        <td class="table-no-data" colspan="8">无相关数据</td>
                    </tr>
                @else
                    @foreach($data['data'] as $key => $vo)
                        <tr>
                            <td><input type="checkbox" title="{{$vo['id']}}"></td>
                            <td>
                                <a class="ellipsis_ padding_move tl">{{$vo['content']}}</a>
                            </td>
                            <td>{{$vo['action_name']}}</td>
                            <td>{{$vo['module_name']}}</td>
                            <td>{{Date('Y/m/d H:i:s',strtotime($vo['date']))}}</td>
                            <td>{{$vo['username']}}</td>
                            <td>123</td>
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <td colspan="7">
                        <div class="painate" style="float:right;margin-top:2px">
                            <ul id="pagination-digg">
                                <li><a href="javascript:void(0)">第{{$data['current_page']}}页</a></li>
                                @for($i = 1;$i<=$data['last_page'];$i++)
                                    <li><a href="?page={{$i}}">{{$i}}</a></li>
                                @endfor
                                <li class="next">
                                    <a href="javascript:void(0)">共{{$data['last_page']}}页/计{{$data['total']}}条</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <script>
    </script>
@stop