@extends('admin.home')
@section('title','product')
@section('link')
    @parent
@stop
@section('stylesheet')
    @parent
@stop
@section('nav')
    @parent
@stop
@section('subject','商品列表')
@section('body')
    <div class="container">
        <div class="panel">
            <a class="btn btn-default" href="product_form">添加商品</a>
        </div>
        <div class="product-main">
            <table class="table product-table">
                <tr class="active">
                    <td>选择</td>
                    <td>缩略图</td>
                    <td>名称</td>
                    <td>分类</td>
                    <td>创建时间</td>
                    <td>更新时间</td>
                    <td>操作人</td>
                    <td>操作</td>
                </tr>
                @if(!$data['total'])
                    <tr>
                        <td class="table-no-data" colspan="8">无相关数据!</td>
                    </tr>
                @else
                    @foreach($data['data'] as $item => $value)
                        <tr>
                            <td><input type="checkbox" title="{{$value['id']}}"></td>
                            <td><img src="{{empty($value['images']) ? '' : url($value['images'][0]['path'])}}"></td>
                            <td>{{mb_strlen($value['name']) > 6 ? mb_substr($value['name'],0,6).'...' : $value['name']}}</td>
                            <td>{{mb_strlen($value['sort_name']) > 6 ? mb_substr($value['sort_name'],0,6).'...' : $value['sort_name']}}</td>
                            <td>{{$value['created_at']}}</td>
                            <td>{{$value['updated_at']}}</td>
                            <td>{{mb_strlen($value['username']) > 6 ? mb_substr($value['username'],0,6).'...' : $value['username']}}</td>
                            <td>
                                <a class="product-action glyphicon glyphicon-info-sign"
                                   tabindex="0"
                                   data-toggle="popover"
                                   data-trigger="focus"
                                   role="button"
                                   data-placement="bottom"
                                   data-content="<a href='product_form/{{$value['id']}}'>修改</a>
                                   <br/><a href='javascript:void(0)' data-id='{{$value['id']}}'
                                   onclick='product_delete(this)'>删除</a>">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <td colspan="8">
                        <div class="painate" style="float:right;margin-top:2px">
                            <ul id="pagination-digg">
                                @for($i = 1;$i<=$data['last_page'];$i++)
                                    <li><a href="?page={{$i}}">{{$i}}</a></li>
                                @endfor
                                <li class="next"><a href="javascript:void(0)">共{{$data['last_page']}}
                                        页/计{{$data['total']}}条</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover({html: true});
        });
        function product_delete(target) {
            var id = $(target).data('id');
            if (!id) {
                return false;
            }
            Confirm({
                title: "删除确认",
                message: "你确定删除这个商品吗?",
                callback: function () {
                    $.ajax({
                        url: 'product/' + id,
                        method: 'delete',
                        success: function (data) {
                            if (data.id) {
                                location.reload();
                            }
                        }
                    });
                }
            });
        }
    </script>
@stop