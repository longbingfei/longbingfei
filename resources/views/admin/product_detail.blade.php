<?php
if (!isset($detail) || empty($detail) || isset($detail['error_code'])) {
    die('数据不存在!');
}
?>
@extends('admin.base')
@section('title','商品详情')
@section('link')
    @parent
@stop
@section('stylesheet')
@stop
@section('nav')
    @parent
@stop
@section('subject',$detail['name'].'<a class="a-edit-product" href="'.url('admin/product_form/'.$detail['id']).'">编辑</a>')
@section('body')
    <div class="detail-title">
        <span class="title-sort">分类:&nbsp{{$detail['sort_name']}}</span>
        <span class="title-pt">发布时间:&nbsp{{$detail['created_at']}}</span>
        <span class="title-author">发布人:&nbsp{{$detail['username']}}</span>
    </div>
    <div class="product-detail-container">
        <div class="product-detail-carousel"></div>
        <div class="product-describe">
            {!! $detail['describe'] !!}
        </div>
    </div>
    <script>
        Carousel.init({
            images: '{!! json_encode($detail['images']) !!}',
            payload: $('.product-detail-carousel'),
            host: "{{url()}}/"
        });
    </script>
@stop

