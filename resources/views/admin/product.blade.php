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
                                <img src="{{empty($value['images']) ? url('default/images/product.png') : url($value['images'][0]['path'])}}">
                            </td>
                            <td>
                                <a class="ellipsis_ padding_move"
                                   href="{{url('admin/feature/product/show/'.$value['id'])}}">{{$value['name']}}</a>
                            </td>
                            <td>{{$value['sort_name']}}</td>
                            <td>{{$value['storage']}}</td>
                            <td><span class="ellipsis_">{{$value['username']}}</span></td>
                            <td>{{Date('Y/m/d H:i:s',strtotime($value['created_at']))}}</td>
                            <td>{{Date('Y/m/d H:i:s',strtotime($value['updated_at']))}}</td>
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
                    <td colspan="9">
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
    </script>
@stop