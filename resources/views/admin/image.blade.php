@extends('admin.home')
@section('title','图片库')
@section('link')
    @parent
@stop
@section('stylesheet')
    @parent
@stop
@section('nav')
    @parent
@stop
@section('subject','图片库')
@section('body')
    @parent
    <div class="container-image">
        @foreach($images as $vo)
            <div class="image-pic-box">
                <div class="image-pic-inner">
                    <img src="{{url($vo['thumb'])}}">
                </div>
            </div>
        @endforeach
    </div>
    <script>
    </script>
@stop