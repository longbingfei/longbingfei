<?php
    if (!isset($detail) || empty($detail) || isset($detail['error_code'])) {
        die('数据不存在!');
    }
?>
@extends('admin.base')
@section('title','文稿详情')
@section('link')
    @parent
@stop
@section('stylesheet')
@stop
@section('nav')
    @parent
@stop
@section('subject',$detail['title'].'<a class="a-edit-article" href="'.url('admin/article_form/'.$detail['id']).'">编辑</a>')
@section('body')
    <div class="detail-title">
        <span class="title-sort">分类:&nbsp{{$detail['sort_name']}}</span>
        <span class="title-pt">发布时间:&nbsp{{$detail['created_at']}}</span>
        <span class="title-author">发布人:&nbsp{{$detail['author_name']}}</span>
    </div>
    <div class="article-detail-container">
        {!! $detail['content'] !!}
    </div>
@stop