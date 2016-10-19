@extends('admin.home')
@section('title','商品列表')
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
        <a class="btn btn-default top-btn" href="product_settings"><i class="glyphicon glyphicon-cog"></i>&nbsp配置</a>
        <a class="btn btn-default top-btn" href="product_form"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp新增</a>
        <div style="clear:both"></div>
        <div class="product-main">
            <table class="table table-hover product-table">
                <tr class="active">
                    <td>选择</td>
                    <td>缩略图</td>
                    <td>名称</td>
                    <td>分类</td>
                    <td>库存</td>
                    <td>操作人</td>
                    <td>创建时间</td>
                    <td>更新时间</td>
                    <td>状态</td>
                    <td>操作</td>
                </tr>
                @if(!$data['total'])
                    <tr>
                        <td class="table-no-data" colspan="9">无相关数据!</td>
                    </tr>
                @else
                    @foreach($data['data'] as $item => $value)
                        <tr>
                            <td><input type="checkbox" title="{{$value['id']}}"></td>
                            <td>
                                <div class="product_index_pic">
                                    <img src="{{empty($value['images']) ? url('default/images/product.png') : url($value['images'][0]['path'])}}">
                                </div>
                            </td>
                            <td>
                                <a class="ellipsis_ padding_move"
                                   href="{{url('admin/feature/product/show/'.$value['id'])}}">{{$value['name']}}</a>
                            </td>
                            <td class="sort">{{$value['sort_name']}}</td>
                            <td>{{$value['storage']}}</td>
                            <td><span class="ellipsis_">{{$value['username']}}</span></td>
                            <td>{{Date('Y/m/d H:i:s',strtotime($value['created_at']))}}</td>
                            <td>{{Date('Y/m/d H:i:s',strtotime($value['updated_at']))}}</td>
                            <td class="product-status" data-id="{{$value['id']}}">
                                <i class="{{$value['is_promote'] ? 'color-a' : 'color-b'}} glyphicon glyphicon-thumbs-up"
                                   title="首页推荐" data-promote="{{$value['is_promote']}}"></i>
                                &nbsp
                                <i class="{{$value['is_carousel'] ? 'color-a' : 'color-b'}} glyphicon glyphicon-time"
                                   title="首页轮播" data-carousel="{{$value['is_carousel']}}"></i>
                            </td>
                            <td>
                                <a class=" product-action glyphicon glyphicon-info-sign"
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
                    <td colspan="10">
                        <div class="painate" style="float:right;margin-top:2px">
                            <ul id="pagination-digg">
                                <li><a href="javascript:void(0)">第{{$data['current_page']}}页</a></li>
                                @for($i = 1;$i<=$data['last_page'];$i++)
                                    <li><a href="?page={{$i}}">{{$i}}</a></li>
                                @endfor
                                <li class="next">
                                    <a href="javascript:void(0)">共{{$data['last_page']}}页/计{{$data['total']}}条
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <script type="text/javascript">
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
                            } else {
                                Confirm({message: data.error_message});
                            }
                        }
                    });
                }
            });
        }
        $(".product-status i").click(function () {
            var id = $(this).parent().data('id');
            var action_name;
            var send_data = {'_method': 'put'};
            if (typeof $(this).data('promote') === 'number') {
                send_data.is_promote = $(this).data('promote') ? 0 : 1;
                action_name = send_data.is_promote ? '推荐' : '取消推荐';
            } else if (typeof $(this).data('carousel') === 'number') {
                send_data.is_carousel = $(this).data('carousel') ? 0 : 1;
                action_name = send_data.is_carousel ? '轮播' : '取消轮播';
            }
            var that = $(this);
            Confirm({
                title: '操作确认',
                message: "你确定" + action_name + "此商品吗?",
                callback: function () {
                    $.ajax({
                        url: 'style/' + id,
                        data: send_data,
                        method: 'post',
                        success: function (data) {
                            if (data.id) {
                                if (that.hasClass('color-a')) {
                                    that.removeClass('color-a').addClass('color-b');
                                } else {
                                    that.removeClass('color-b').addClass('color-a');
                                }
                            } else {
                                Confirm({message: data.error_message});
                            }
                        }
                    });
                }
            });
        });
    </script>
@stop