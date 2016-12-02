<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>首页</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="{{ url('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('default/css/front.css')}}" rel="stylesheet">
    <script src="{{ url('default/js/jquery.1.10.js') }}"></script>
    <script src="{{ url('bootstrap/dist/js/bootstrap.min.js') }}"></script>
</head>
<body>
<div class="main">
    <div class="website-navbar">
        <ul>
            <li>首页</li>
            <li>xx</li>
            <li>公司信息</li>
            <li>联系我们</li>
            <li>联系我们</li>
        </ul>
        <div style="clear:both"></div>
    </div>
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($style['carousel'] as $k => $v)
                <li data-target="#carousel" data-slide-to="{{$k}}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach($style['carousel'] as $k => $v)
                <div class="item">
                    <img src="{{url($v['image_path'])}}">
                    <div>其中包含控制器、路由、Eloquent 模型、Artisan 命令、资源文件，和其它专属于你的程序代码。开始前，请先在你的本地环境中 安装一个新的 Laravel 5 应用程序
                        到一个全新的目录中。不要安装超过 5.0 的任何版本，因为我们需要先完成迁移至 5.0 的步骤。我们将会在后面详细探讨各部分的详细迁移过程
                    </div>
                </div>
            @endforeach
        </div>
        <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        </a>
    </div>
    <div id="">
    </div>
</div>
<script>
    $(".carousel-indicators li:first").addClass("active");
    $(".carousel-inner div:first").addClass("active");
</script>
</body>
</html>