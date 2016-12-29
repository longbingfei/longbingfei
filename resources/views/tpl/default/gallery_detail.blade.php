<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$detail['title']}}</title>
    <link rel="icon" href="{{ url('default/images/site.ico') }}" type="image/x-ico"/>
    <link href="{{ url('default/css/admin_home.css')}}" rel="stylesheet">
    <script src="{{ url('default/js/jquery.1.10.js') }}"></script>
    <script src="{{ url('default/js/respond.min.js') }}"></script>
    <script src="{{ url('default/js/main.js') }}"></script>
</head>
<body>
<pre>
<h2>{{$detail['title']}}</h2>
    创建日期:<span>{{$detail['created_at']}}</span>
    索引图:
    @if(!empty($detail['index_pic']))<img src="{{url($detail['index_pic']['thumb'])}}">@endif
    相册:
    <div id="gallery" style="width:400px;height:300px;"></div>
    <script>
        Carousel.init({images: '{!! json_encode($detail['images']) !!}', payload: $('#gallery'), host: '{{url('')}}/'});
    </script>
</pre>
</body>
</html>