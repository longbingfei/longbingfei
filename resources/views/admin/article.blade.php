@extends('admin.home')
@section('title')article
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
@section('subject','新闻列表')
@section('body')
    @parent
    <div class="container">
        <a class="btn btn-default top-btn" href="article_form"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp新增</a>
        <div class="article-main">
            <table class="table table-hover article-table">
                <tr class="active">
                    <td>选择</td>
                    <td>标题</td>
                    <td>分类</td>
                    <td>作者</td>
                    <td>创建时间</td>
                    <td>更新时间</td>
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
                            <td>{{$vo['author_name']}}</td>
                            <td>{{$vo['created_at']}}</td>
                            <td>{{$vo['updated_at']}}</td>
                            <td>
                                <a class="article-action glyphicon glyphicon-info-sign"
                                   tabindex="0"
                                   data-toggle="popover"
                                   data-trigger="focus"
                                   role="button"
                                   data-placement="bottom"
                                   data-content="<a href='article_form/{{$vo['id']}}'>修改</a>
                                   <br/><a href='javascript:void(0)' data-id='{{$vo['id']}}'
                                   onclick='article_delete(this)'>删除</a>">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <td colspan="8">
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
        function article_delete(target) {
            var id = $(target).data('id');
            if (!id) {
                return false;
            }
            Confirm({
                title: "删除确认",
                message: "你确定删除这篇文稿吗?",
                callback: function () {
                    $.ajax({
                        url: 'article/' + id,
                        method: 'delete',
                        success: function (data) {
                            if (data.id) {
                                location.reload();
                            } else {
                                Confirm({message: data.error_message});
                            }
                        }
                    });
                }
            });
        }
    </script>
@stop