<?php
$image = $_POST['data']['image'];
$video = $_POST['data']['video'];
$frame = $_POST['data']['frame'];
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <style>
        .image{
            position:relative;
            width:150px;
            height:150px;
        }
        .image img{
            width:100%;
            height:100%;
        }
        .image div:last-child{
            width:100%;
            height:100%;
            display:none;
            position:absolute;
            top:0px;
            z-index: 10;
            color:#cccccc;
        }
        .cover{
            position:absolute;
            top:0px;
            height:100%;
            z-index: 1;
            background: black;
            opacity: 0.4;
        }

    </style>
</head>
<body>
<ul class="nav nav-tabs nav-justified">
    <li role="presentation" class="active"><a href="#">图片</a></li>
    <li role="presentation"><a href="#">视频</a></li>
    <li role="presentation"><a href="#">音频</a></li>
</ul>
<div class="container">
    <div class="main">
        @foreach($image as $v)
        <div class="col-xs-4 col-md-2">
            <a href="#" class="thumbnail image">
                <img src="{{url($v['path'])}}">
                <div class="cover"></div>
                <div>
                    <span>{{$v['created_at']}}</span>
                    <span>{{$v['created_at']}}</span>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
<script>
    $(".image").hover(function(){
        var div1 = $(this).children('div:eq(0)');
        var div2 = $(this).children('div:eq(1)');
        div1.stop(0).animate({width:"100%"},150,function(){
            div2.css('display','block');
        });
    },function(){
        var div1 = $(this).children('div:eq(0)');
        var div2 = $(this).children('div:eq(1)');
        div2.css('display','none');
        div1.stop(0).animate({width:0},150);
    });
</script>
</body>
</html>