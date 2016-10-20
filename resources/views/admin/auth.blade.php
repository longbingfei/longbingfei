@extends('admin.home')
@section('title')
@stop
@section('link')
    @parent
@stop
@section('stylesheet')
    @parent
@stop
@section('nav')
    @parent
@stop
@section('subject','用户与权限')
@section('body')
    @parent
    <div class="container">
        <a class="btn btn-default top-btn" href=""><i class="glyphicon glyphicon-cog"></i>&nbsp配置</a>
        <a class="btn btn-default top-btn" href=""><i class="glyphicon glyphicon-plus-sign"></i>&nbsp新增</a>
        <div class="article-main">
            <table class="table table-hover article-table">
                <tr class="active">
                    <td>头像</td>
                    <td>用户名</td>
                    <td>权限</td>
                    <td>创建者</td>
                    <td>操作</td>
                </tr>
                @if(!$users['total'])
                    <tr>
                        <td class="table-no-data" colspan="5">无相关数据</td>
                    </tr>
                @else
                    @foreach($users['data'] as $key => $vo)
                        <tr>
                            <td>
                                <div>
                                    <img src="{{empty($vo['avatar']) ? url('default/images/default_avatar.jpeg') : url($vo['avatar']['thumb'])}}">
                                </div>
                            </td>
                            <td>
                                <a class="ellipsis_ padding_move" href="">{{$vo['username']}}</a>
                            </td>
                            <td>xx</td>
                            <td>{{$vo['creator_id']}}</td>
                            <td>
                            </td>
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <td colspan="5">
                        <div class="painate" style="float:right;margin-top:2px">
                            <ul id="pagination-digg">
                                <li><a href="javascript:void(0)">第{{$users['current_page']}}页</a></li>
                                @for($i = 1;$i<=$users['last_page'];$i++)
                                    <li><a href="?page={{$i}}">{{$i}}</a></li>
                                @endfor
                                <li class="next">
                                    <a href="javascript:void(0)">共{{$users['last_page']}}页/计{{$users['total']}}条</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@stop