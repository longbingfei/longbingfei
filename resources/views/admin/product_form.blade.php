@extends('admin.home')
@section('title','product_form')
@section('link')
    @parent
@stop
@section('stylesheet')
    h3{
        text-align:center
    }
    .main_product_form{
        width:80%;
        height: 800px;
        margin:0 auto;
        box-shadow: 0 0 6px #0D3349;
    }
    .form-span{
    }
@stop
@section('body')
    @parent
    <h3>xxxx</h3>
    <div class="main_product_form">
        <span class="form-span">name</span>
        <input class="form-control input" type="text" name="name" placeholder="请输入商品名,50字符以内">
        <span class="form-span">sort</span>
        <select class="form-control" name="sort">
            @foreach($product_sort as $vo)
                <option value="{{$vo['id']}}">{{$vo['name']}}</option>
            @endforeach
        </select>
    </div>
@stop