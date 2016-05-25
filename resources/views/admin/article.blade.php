<?php $data = isset($_POST['data']) ? json_decode($_POST['data'],1) : [] ;?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <style>
        .checkbox{
            cursor:pointer
        }
    </style>
</head>
<body>
<div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>选择</th>
                    <th>标题</th>
                    <th>状态</th>
                    <th>作者</th>
                    <th>创建于</th>
                    <th>更新于</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $key => $vo)
                <tr>
                    <td title={{$vo['id']}}><input class="checkbox" type="checkbox" value="{{$vo['id']}}"></td>
                    <td>{{$vo['title']}}</td>
                    <td>{{$vo['status']}}</td>
                    <td>{{$vo['author_id']}}</td>
                    <td>{{$vo['created_at']}}</td>
                    <td>{{$vo['updated_at']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
</script>
</body>
</html>