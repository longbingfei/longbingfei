@extends('admin.home')
@section('title','product')
@section('link')
    @parent
    @stop
@section('stylesheet')
    @parent
        .panel{
            /*box-shadow: 0 0 6px #0D3349;*/
        }
        .product-main{
            overflow: hidden;
            width:100%;
            box-shadow: 0 0 6px #0D3349;
        }
        .product-table tr td{
            vertical-align: middle !important;
        }
        .product-table tr:first-child td{
            font-size: 16px;
            font-weight: 400;
        }
        td img{
            width:80px;
            height:60px;
        }
    @stop
@section('body')
    @parent
<div class="container">
    <div class="panel">
        <a class="btn btn-primary new-product-a" href="product_form">新建</a>
    </div>
    <div class="product-main">
        <table class="table table-hover product-table">
            <tr class="active">
                <td>选择</td>
                <td>展示</td>
                <td>名称</td>
                <td>分类</td>
                <td>创建时间</td>
                <td>更新时间</td>
                <td>操作人</td>
                <td>操作</td>
            </tr>
            @if(empty($data))
                <tr>
                    <td>无相关数据</td>
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
        </table>
    </div>
    @if(!empty($data))
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
<script>
    //
</script>
@stop