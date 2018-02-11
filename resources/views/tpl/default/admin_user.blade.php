<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="/asset/web/plugins/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="/asset/web/css/index11.css">
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>
<table class="table">
    <tr>
        <th>序号</th>
        <th>用户名</th>
        <th>手机号</th>
        <th>邮箱</th>
        <th>状态</th>
        <th>类型</th>
        <th>上次登录时间</th>
        <th>操作</th>
    </tr>
    @foreach($data as $key=>$vo)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$vo->username}}</td>
            <td>{{$vo->tel}}</td>
            <td>{{$vo->email}}</td>
            <td>{{$statusShow[$vo->status]}}</td>
            <td>{{$typeShow[$vo->type]}}</td>
            <td>{{$vo->last_login_time}}</td>
            <td>
                @if($vo->id > 1)
                    @if($vo->status)
                        <button class="btn btn-xs btn-danger admin_change_user_status" data-status="{{$vo->status}}" data-id="{{$vo->id}}">冻结
                        </button>
                    @else
                        <button class="btn btn-xs btn-success admin_change_user_status" data-status="{{$vo->status}}" data-id="{{$vo->id}}">恢复
                        </button>
                    @endif
                @endif
            </td>
        </tr>
    @endforeach
    {!! $data->render() !!}
</table>
</body>
<script src="/asset/web/js/use/index.js"></script>
</html>