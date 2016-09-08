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
@section('title','商品分类设置')
@section('link')
    @parent
@stop
@section('stylesheet')
@stop
@section('nav')
    @parent
@stop
@section('subject','商品分类设置')
@section('body')
    @parent
    <div class="product-sort"></div>
    <script>
        var sort_data = '{!! json_encode($product_sort) !!}';
        Sort.init({dom:$(".product-sort"),data:sort_data});
    </script>
@stop
