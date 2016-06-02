<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>homepage</title>
    <!-- Bootstrap -->
    <link href="{{ url('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('default/css/carousel.css')}}" rel="stylesheet">
    <style>

    </style>
</head>
<body>
<div class="navbar-wrapper">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="javascript:void(0)">二蛋</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">首页</a></li>
                        <li><a href="#promote">店长推荐</a></li>
                        <li><a href="#hot">热销</a></li>
                        <li><a href="#contact">联系我们</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">点我<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">哈哈</a></li>
                                <li><a href="#">呵呵</a></li>
                                <li><a href="#">哒哒</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">华丽</li>
                                <li><a href="#">分解</a></li>
                                <li><a href="#">线</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img class="first-slide" src="homepage/image/h1.jpg">
                <div class="container">
                    <div class="carousel-caption">
                        <h1></h1>
                        <p></p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                    </div>
                </div>
            </div>
        <div class="item">
            <img class="second-slide" src="homepage/image/h2.jpg">
            <div class="container">
                <div class="carousel-caption">
                    <h1></h1>
                    <p></p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="homepage/image/h3.jpg">
            <div class="container">
                <div class="carousel-caption">
                    <h1></h1>
                    <p></p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="forth-slide" src="homepage/image/h4.jpg">
            <div class="container">
                <div class="carousel-caption">
                    <h1></h1>
                    <p></p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">xxx</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">上一页</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">下一页</span>
    </a>
</div>
{{--4,4,4row--}}
<div class="container marketing">
    <div class="row" id="promote">
        <div class="col-lg-4">
            <img class="img-circle" src="" width="140" height="140">
            <h2>{{$articles[0]['title']}}</h2>
            <p>{{$articles[0]['content']}}</p>
            <p><a class="btn btn-default" href="#" role="button">更多 &raquo;</a></p>
        </div>
        <div class="col-lg-4">
            <img class="img-circle" src="" width="140" height="140">
            <h2>{{$articles[1]['title']}}</h2>
            <p>{{$articles[1]['content']}}</p>
            <p><a class="btn btn-default" href="#" role="button">更多 &raquo;</a></p>
        </div>
        <div class="col-lg-4">
            <img class="img-circle" src="" width="140" height="140">
            <h2>{{$articles[2]['title']}}</h2>
            <p>{{$articles[2]['content']}}</p>
            <p><a class="btn btn-default" href="#" role="button">更多 &raquo;</a></p>
        </div>
    </div>

    <hr class="featurette-divider" id="hot">

    <div class="row featurette row-top">
        <div class="col-md-4">
                <a href="#" class="thumbnail image">
                    <img src="">
                    <div class="cover"></div>
                    <div class="info-div">
                    </div>
                </a>
        </div>
        <div class="col-md-4">
            <a href="#" class="thumbnail image">
                <img src="">
                <div class="cover"></div>
                <div class="info-div">
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="#" class="thumbnail image">
                <img src="">
                <div class="cover"></div>
                <div class="info-div">
                </div>
            </a>
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette row-middle">
        <div class="col-md-4">
            <a href="#" class="thumbnail image">
                <img src="">
                <div class="cover"></div>
                <div class="info-div">
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="#" class="thumbnail image">
                <img src="">
                <div class="cover"></div>
                <div class="info-div">
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="#" class="thumbnail image">
                <img src="">
                <div class="cover"></div>
                <div class="info-div">
                </div>
            </a>
        </div>
    </div>

    <hr class="featurette-divider">
    <div class="row shop-detail">
    </div>

    <hr class="featurette-divider">
    <div class="row contact-us" id="contact">
    </div>

    <footer>
        <p class="pull-right"><a href="#">返回顶端</a></p>
        <p>&copy; Sign</p>
    </footer>
</div>
<script src="{{ url('default/js/jquery.js') }}"></script>
<script src="{{ url('bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script>

</script>
</body>
</html>