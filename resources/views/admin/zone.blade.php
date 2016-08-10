<?php
$user = $_POST['data'];
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <style>
        .self_info span{
            position:absolute;
            left:200px;
        }
        img{
            cursor:pointer;
        }
        #upload_avatar{
            display:none
        }
    </style>
</head>
<body>
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">个人中心</div>
        <div id="avatar" class="panel-body">
            {{--panel-body内容不能有其他子类--}}
                <img src="{{url($user['avatar_path'])}}" width="150px" height="150px" title="点击上传">
        </div>
        <ul class="list-group self_info">
            <li class="list-group-item">用户名:<span>{{$user['username']}}</span></li>
            <li class="list-group-item">姓名:<span>{{$user['name']}}</span></li>
            <li class="list-group-item">性别:<span>{{$user['sex']}}</span></li>
            <li class="list-group-item">手机:<span>{{$user['tel']}}</span></li>
            <li class="list-group-item">邮箱:<span>{{$user['email']}}</span></li>
            <li class="list-group-item">上次登录时间:<span>{{$user['last_login_time']}}</span></li>
            <li class="list-group-item">账号状态:<span>{{$user['status']}}</span></li>
        </ul>
    </div>
    <input id="upload_avatar" type="file" onchange="uploadImage(this)">
</div>
<script>
    function uploadImage(obj){
        var file = obj.files[0];
        if(file){
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e){
                var data = e.target.result;
                console.log(e.target.result);
                var img = $('<img src="'+data+'">').css({"width":"150px","height":"150px"});
                $('#avatar').find('img').remove();
                $('#avatar').append(img);
            }

            //upload
            var form = new FormData();
            form.append('file',file);
            var ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    //
                }
            }
            ajax.open('post','{{ url('/admin/auth/update/'.Auth::id())}}',true);
            ajax.send(form);
        }
    }
    $("#avatar").on("click",function(){
        $("#upload_avatar").click();
    })
</script>
</body>
</html>

