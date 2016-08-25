@extends('admin.home')
@section('title')article
@stop
@section('link')
    @parent
@stop
@section('stylesheet')
    @parent
    .checkbox,tr{
    cursor:pointer
    }
    .article-main{
    overflow: hidden;
    width:100%;
    box-shadow: 0 0 6px #0D3349;
    }
    .article-table tr td{
    vertical-align: middle !important;
    }
    .article-table tr:first-child td{
    font-size: 16px;
    font-weight: 400;
    }
    td img{
    width:80px;
    height:60px;
    }
@stop
@section('nav')
    @parent
@stop
@section('subject','新闻列表')
@section('body')
    @parent
    <div class="container">
        <div class="panel">
            <a class="btn btn-default" href="article_form">新建文稿</a>
        </div>
        <div class="article-main">
            <table class="table table-hover article-table">
                <tr class="active">
                    <td>选择</td>
                    <td>标题</td>
                    <td>分类</td>
                    <td>作者</td>
                    <td>创建时间</td>
                    <td>更新时间</td>
                    <td>操作人</td>
                    <td>操作</td>
                </tr>
                @if(!$data['total'])
                    <tr>
                        <td class="table-no-data" colspan="8">无相关数据</td>
                    </tr>
                @else
                    @foreach($data['data'] as $key => $vo)
                        <tr>
                            <td title="{{$vo['id']}}"><input class="checkbox" type="checkbox" value="{{$vo['id']}}">
                            </td>
                            <td class="detail" data-id="{{$vo['id']}}">{{$vo['title']}}</td>
                            <td>{{$vo['sort_name']}}</td>
                            <td>{{$vo['status']}}</td>
                            <td>{{$vo['author_name']}}</td>
                            <td>{{$vo['created_at']}}</td>
                            <td>{{$vo['updated_at']}}</td>
                            <td class="delete" data-id="{{$vo['id']}}"><i class="glyphicon glyphicon-remove"></i></td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
        @if($data['total'])
            <div class="painate" style="float:right;margin-top: 2px">
                <ul id="pagination-digg">
                    @for($i = 1;$i<=$data['last_page'];$i++)
                        <li><a href="?page={{$i}}">{{$i}}</a></li>
                    @endfor
                    <li class="next"><a href="javascript:void(0)">共{{$data['last_page']}}页/计{{$data['total']}}条</a></li>
                </ul>
            </div>
        @endif
    </div>
@stop