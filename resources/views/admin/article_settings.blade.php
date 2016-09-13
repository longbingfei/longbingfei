@extends('admin.home')
@section('title','文稿分类设置')
@section('link')
    @parent
@stop
@section('stylesheet')
@stop
@section('nav')
    @parent
@stop
@section('subject','文稿分类设置')
@section('body')
    @parent
    <div class="article-sort"></div>
    <script>
        Sort.init({dom: $(".article-sort"), url: "{{url('admin/feature/article_sort')}}"});
    </script>
@stop
