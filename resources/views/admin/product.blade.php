@extends('admin.home')
@section('title','product')
@section('link')
    @parent
    @stop
@section('stylesheet')
    @parent
    .product-bar{
    width:100%;
    height:200px;
    box-shadow: 0 0 6px #0D3349;
    position:relative;
    }
    .bar-bottom{
        display:block;
        width:50px;
        height:30px;
        border:1px solid grey;
        font-size:16px;
    }
    @stop
@section('body')
    @parent
<div class="container">
    <div class="panel">
        <a class="btn btn-default" href="product_form">添加商品</a>
    </div>
    {{--<div class="product-bar">--}}
        {{----}}
    {{--</div>--}}
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
                    <td><input type="checkbox"></td>
                    <td><img src="{{empty($value['images']) ? '' : url($value['images'][0]['path'])}}"></td>
                    <td>{{$value['name']}}</td>
                    <td>{{$value['sort_name']}}</td>
                    <td>{{$value['created_at']}}</td>
                    <td>{{$value['updated_at']}}</td>
                    <td>{{$value['username']}}</td>
                    <td>xxx</td>
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
                            <li class="next"><a href="javascript:void(0)">共{{$data['last_page']}}页/计{{$data['total']}}条</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
<script>
    //
</script>
@stop