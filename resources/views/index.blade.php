<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    {{--<link rel="stylesheet" href="default/css/videotool.css">--}}
    <script type="text/javascript" src="default/js/jquery.js"></script>
    <script type="text/javascript" src="default/js/main.js"></script>
</head>
<body>
    <div class="frame"></div>
</body>
<script>
    var src = "http://vfile1.dev.hogesoft.com:233/2015/1448/3460/1335/144834601335.ssm/144834601335.mp4";
    Video.Init({obj:$(".frame"),width:"500px",height:"300px",id:"nico",controls:false,src:src});
    Video.Controls_init($("#nico"));
</script>
</html>