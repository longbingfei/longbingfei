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
        <th>需求名称</th>
        <th>分类</th>
        <th>发布区域</th>
        <th>周期</th>
        <th>预算</th>
        <th>状态</th>
        <th>电话</th>
        <th>QQ</th>
        <th>微信</th>
        <th>关注人数</th>
        <th>浏览量</th>
        <th>创建者</th>
        <th>创建时间</th>
        <th>操作</th>
    </tr>
    @foreach($data as $key=>$vo)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$vo->title}}</td>
            <td>{{$vo->sort_id}}</td>
            <td>{{$vo->area_ids}}</td>
            <td>{{$vo->period}}</td>
            <td>{{$vo->budget}}</td>
            <td>{{$statusShow[$vo->status]}}</td>
            <td>{{$vo->tel}}</td>
            <td>{{$vo->qq}}</td>
            <td>{{$vo->wechat}}</td>
            <td>{{$vo->fork}}</td>
            <td>{{$vo->hot}}</td>
            <td>{{$users[$vo->user_id]}}</td>
            <td>{{$vo->created_at}}</td>
            <td>
                @if($vo->status <=0)
                    <button class="btn btn-xs btn-danger admin_need_approve admin_change_need_status"
                            data-status="{{$vo->status}}"
                            data-id="{{$vo->id}}">审核
                    </button>
                @else
                    <button class="btn btn-xs btn-danger admin_need_back admin_change_need_status"
                            data-status="{{$vo->status}}"
                            data-id="{{$vo->id}}">打回
                    </button>
                @endif
                    <a class="btn btn-xs btn-info admin_need_edit" data-status="{{$vo->status}}"
                       data-id="{{$vo->id}}" href="/update_need/{{$vo->id}}" target="_blank">修改
                    </a>
                <button class="btn btn-xs btn-success admin_need_delete" data-status="{{$vo->status}}"
                        data-id="{{$vo->id}}">删除
                </button>

            </td>
        </tr>
    @endforeach
    {!! $data->render() !!}
</table>
</body>
<script src="/asset/web/js/use/index.js"></script>
</html>