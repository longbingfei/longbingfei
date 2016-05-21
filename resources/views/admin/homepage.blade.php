{{--Created by PhpStorm. User: zhangxian Date: 16/5/16 Time: 下午1:45--}}
<html lang="ch">
<head>
    <meta charset="utf-8">
    <title>homepage</title>
    <link type="text/css" rel="stylesheet" href="{{url('default/css/main.css')}}">
    <script type="text/javascript"  src="{{url('default/js/jquery.js')}}"></script>
</head>
<body>
<div>
    <div class="container">
        <div class="head">
            Sign ManageMent System
        </div>
        <div class="content">
            <div class="sidebar">
                <div class="userInfo" onclick="openInput()">
                    <div class="userPic">
                        <input id="upload_avatar" type="file" onchange="uploadImage(this)">
                    </div>
                </div>
                <div class="menu">
                </div>
            </div>
            <div class="showbar">
            </div>
        </div>
        <div class="foot">
        </div>
    </div>
</div>
<script>
    function uploadImage(obj){
        console.log(obj.files[0]);
        var file = obj.files[0];
        if(file){
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e){
                var data = e.target.result;
                console.log(e.target.result);
                var img = $('<img src="'+data+'">').css({"width":"100px","height":"100px"});
                $('.userPic').find('img').remove();
                $('.userPic').append(img);
            }

            //upload
            var form = new FormData();
            form.append('file',file);
            var ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    console.log(this.responseText);
                }
            }
            ajax.open('post','http://192.168.1.106:8000/admin/feature/media',true);
            ajax.send(form);
        }
    }

    function openInput(){
        var dom = document.getElementById('upload_avatar');
        dom.click();
    }

</script>
</body>
</html>