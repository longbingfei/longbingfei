<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$detail['title']}}</title>
</head>
<body>
<pre>
<h2>{{$detail['title']}}</h2>
    作者:<span>{{$detail['author_name']}}</span>
    创建日期:<span>{{$detail['created_at']}}</span>
<p>
    {{$detail['content']}}
</p>
</pre>
</body>
</html>