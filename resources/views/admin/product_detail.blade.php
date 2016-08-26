<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/8/26
 * Time: 下午3:31
 */
?>
@extends('admin.home')
@section('title','detail')
@section('link')
    @parent
@stop
@section('stylesheet')
@stop
@section('nav')
    @parent
@stop
@section('subject','detail')
@section('body')
    <div class="product-detail-container">
        <div class="product-detail-carousel"></div>
    </div>
    <script>
        Carousel.init({images:[{"name":"\u5c4f\u5e55\u5feb\u7167 2016-05-31 \u4e0b\u53484.16.11","sort_id":4,"path":"product\/images\/NO.14720010746146\/14720010746148.png","thumb":"product\/images\/NO.14720010746146\/thumb\/14720010746148.png","user_id":1,"updated_at":"2016-08-24 09:11:14","created_at":"2016-08-24 09:11:14","id":4},{"name":"\u5c4f\u5e55\u5feb\u7167 2016-06-07 \u4e0a\u534810.03.49","sort_id":4,"path":"product\/images\/NO.14720010746146\/14720010746702.png","thumb":"product\/images\/NO.14720010746146\/thumb\/14720010746702.png","user_id":1,"updated_at":"2016-08-24 09:11:14","created_at":"2016-08-24 09:11:14","id":5},{"name":"\u7c98\u8d34\u56fe\u7247","sort_id":4,"path":"product\/images\/NO.14720010746146\/14720110261276.png","thumb":"product\/images\/NO.14720010746146\/thumb\/14720110261276.png","user_id":1,"updated_at":"2016-08-24 11:57:06","created_at":"2016-08-24 11:57:06","id":29},{"name":"bg","sort_id":4,"path":"product\/images\/NO.14720010746146\/14720110262267.png","thumb":"product\/images\/NO.14720010746146\/thumb\/14720110262267.png","user_id":1,"updated_at":"2016-08-24 11:57:06","created_at":"2016-08-24 11:57:06","id":30}],payload:$(".product-detail-carousel")});
    </script>
@stop

