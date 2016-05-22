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
    <div class="container" style="background:url({{ url('default/images/bg.gif') }})">
        <div class="head">
           <div class="title"><h1>Sign ManageMent System</h1></div>
           <div class="gif"><img src="{{ url('default/images/title.gif')  }}" title="you yi xiao chuan"></div>
        </div>
        <div class="content">
            <div class="sidebar">
                <div class="userInfo">
                    <div class="userPic" onclick="openInput()" title="click to change avatar">
                        <input id="upload_avatar" type="file" onchange="uploadImage(this)">
                        <img width=100 height=100 src="{{ url((new \App\Repositories\Eloquents\Media)->show(Auth::User()->avatar)->path) }}">
                    </div>
                </div>
                <div class="menu">
                    <div onclick="showArticle()">Article</div>
                    <div >Product</div>
                    <div >Media</div>
                    <div >Role</div>
                </div>
            </div>
            <div class="showbar">
            </div>
        </div>
        <div class="foot">
            <p>@Designed By Sign</p>
            <p>@email sign_mail@163.com</p>
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
            ajax.open('post','{{ url('/admin/auth/update/'.Auth::id())}}',true);
            ajax.send(form);
        }
    }

    function openInput(){
        var dom = document.getElementById('upload_avatar');
        dom.click();
    }
    $('.showbar').width($(window).width()-260);
    $(window).resize(function(){ //shishijiankong
        $('.showbar').width($(window).width()-260);
    });

    function showArticle(){
        var p = $('.showbar');
        $.getJSON('{{ url('admin/feature/article') }}',function(data){
            if(data.length){
//                var obj = $('<div></div>').css({width:p.width(),height:p.height()});
                $.each(data,function(k,value){
                    var obj = $('<div></div>').css({'width':p.width(),'height':'100px','background':'cyan','border':'1px solid red'});
                    obj.html(value.title);
                    $('.showbar').append(obj);
                    console.log(value);
                });
            }
        });
    }

</script>
</body>
</html>