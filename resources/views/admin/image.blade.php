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
    <div id="waterFall" class="container-image">
        @if(empty($images))
            <h5 style="margin:120px auto;color:#faf2cc;text-align: center">无相关图片!</h5>
        @else
            @foreach($images as $vo)
                <div class="image-pic-box">
                    <div class="image-pic-inner">
                        <img src="{{url($vo['thumb'])}}">
                    </div>
                </div>
            @endforeach
            <script>
                WaterFall.init({
                    mainDiv: 'waterFall',
                    boxDiv: 'image-pic-box',
                    picDiv: 'image-pic-inner',
                    dataUrl: "{{url('admin/feature/image')}}",
                });
            </script>
        @endif
    </div>
@stop