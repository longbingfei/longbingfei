<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/9/6
 * Time: 下午4:08
 */
$product_sort = isset($product_sort) ? $product_sort : [];
?>
@extends('admin.home')
@section('title','商品设置')
@section('link')
    @parent
@stop
@section('stylesheet')
@stop
@section('nav')
    @parent
@stop
@section('subject','xxxx')
@section('body')
    <div class="product-sort">

    </div>
    <script>
        Sort.init({dom:$(".product-sort"),sort:'{!! json_encode($product_sort) !!}'});
    </script>
@stop
