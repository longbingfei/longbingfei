<?php
$image = isset($_POST['data']['image']) ? $_POST['data']['image'] : [];
$video = isset($_POST['data']['video']) ? $_POST['data']['video'] : [];
$frame = isset($_POST['data']['frame']) ? $_POST['data']['frame'] : [];
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
        .info-div{
            width:100%;
            height:100%;
            display:none;
            position:absolute;
            top:0px;
            z-index: 10;
            color:#f5f5f5;
        }
        .info-p{
            position:absolute;
            bottom: 20px;
            left: 10px;
        }
        .info-p2{
            position:absolute;
            bottom: 0px;
            left: 10px;
        }
        .cover{
            position:absolute;
            top:0px;
            height:100%;
            z-index: 1;
            background: black;
            opacity: 0.4;
        }
        .media-menu{
            border-top:0px solid grey;
        }
        #preview{
            position:relative;
            width:200px;
            height:200px;
            border:1px dashed grey;
            text-align: center;
            line-height: 200px;
            cursor:pointer;
        }
        .icon{
            color:#cccccc;
            font-size:40px;
        }

    </style>
</head>
<body>
<ul class="nav nav-tabs nav-justified">
    <li role="presentation" class="active"><a href="#main">图片</a></li>
    <li role="presentation"><a href="#main">视频</a></li>
    <li role="presentation"><a href="#">音频</a></li>
</ul>
<div class="panel panel-default media-menu">
    <div class="panel-body">
       <a class="btn btn-primary upload-pic">上传图片</a>
    </div>
</div>
@foreach($image as $v)
<div class="col-xs-4 col-md-2">
    <a href="#" class="thumbnail image">
        <img src="{{url($v['path'])}}">
        <div class="cover"></div>
        <div class="info-div">
            <p class="info-p">作者: {{$v['username']}}</p>
            <p class="info-p2">时间: {{ Date('Y/m/d',strtotime($v['created_at']))}}</p>
        </div>
    </a>
    <div>{{$v['title']}}</div>
</div>
@endforeach
{{--modal--}}
<div class="container">
    <div class="modal fade content" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md"> {{--modal-sm modal-lg  style="width:???px"--}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close cancel" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">图片上传</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="title" class="control-label">图片标题:</label>
                            <input type="text" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                            <label for="content" class="control-label">图片预览:</label>
                            <div id="preview">
                                <i class="icon glyphicon glyphicon-plus-sign"></i>
                            </div>
                        </div>
                        <input class="pic-input" type="file" style="display:none">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default cancel" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary submit">上传</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("body").on('mouseover mouseout','.image',function(e){
        var div1 = $(this).children('div:eq(0)');
        var div2 = $(this).children('div:eq(1)');
        if(e.type == "mouseover"){
                div1.stop(0).animate({width:"100%"},150,function(){
                div2.css('display','block');
        });
        }else if(e.type == "mouseout"){
            div2.css('display','none');
            div1.stop(0).animate({width:0},150);
        }
    });

    var MediaUpload = {
        Preview:function(file,preview){
            if(file.length < 0){
                return false;
            }
            var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function(e){
                    var url = e.target.result;
                    var img = $('<img src="'+url+'">');
                    img.css({width:"200px",height:"200px","z-index":100,position:"absolute",left:"0px",top:"0px"});
                    preview.append(img)
                };
        },
        Upload:function(e){
            if(e.data.file == "undefined"){
                return false;
            }
            var form = new FormData();
                form.append('title',e.data.title);
                form.append('file',e.data.file);
            $.ajax({
                method:'POST',
                url:"{{url('admin/feature/media')}}",
                data:form,
                processData : false,
                contentType:false,
                success:function(data){
                   if(data[0]){
                       $.getJSON('{{url("admin/feature/media/")}}'+'/'+data[0],function(data){
                           MediaUpload.Append(data);
                       });
                   }
                }
            });
        },
        Append:function(data){
            var div = $('<div class="col-xs-4 col-md-2"></div>');
            var a = $('<a href="#" class="thumbnail image"></a>');
            var title = $('<div></div>').html(data.title);
            var img = $('<img src="{{url('')}}/'+data.path+'">');
            var divCover = $('<div class="cover"></div>');
            var divInfo = $('<div class="info-div"></div>');
            var p1 = $('<p class="info-p"></p>').html("作者: "+data.username);
            var p2 = $('<p class="info-p2"></p>').html("时间: ");
            divInfo.append(p1).append(p2);
            a.append(img).append(divCover).append(divInfo);
            div.append(a).append(title);
            $(".media-menu").after(div);
            $(".cancel").click();
        }
    }
    $(".upload-pic").on('click',function(){
        $(".modal").modal();
        $("#preview").on('click',function(){
            $(".pic-input").click();
            $("body").on('change','.pic-input',function(){
                var file = $(this)[0].files[0];
                MediaUpload.Preview(file,$("#preview"));
                var data = {};
                var title = $.trim($("#title").val());
                data.title =  title ? title : file.name.split('.')[0];
                data.file = file;
                $(".submit").on('click',data,MediaUpload.Upload);
            });
        });

    });

</script>
</body>
</html>