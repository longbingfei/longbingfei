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
<button class="btn btn-large btn-default" style="margin-bottom: 10px" data-toggle="modal"
        data-target=".bs-example-modal-lg">新增分类
</button>
<table class="table">
    <tr>
        <th>序号</th>
        <th>名称</th>
        <th>操作</th>
    </tr>
    @foreach($data as $key=>$vo)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$vo->name}}</td>
            <td>
                <button class="btn btn-xs btn-danger admin_n_sort_rename"
                        data-id="{{$vo->id}}">重命名
                </button>
                <button class="btn btn-xs btn-success admin_n_sort_delete"
                        data-id="{{$vo->id}}">删除
                </button>

            </td>
        </tr>
    @endforeach
</table>
{!! $data->render() !!}
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document" style="padding:10px;">
        <div class="modal-content">
            <div style="text-align: center">
                <h3 style="text-align: center">需求分类新增</h3>
            </div>
            <div class="form-group mt10">
                <div class="input-group">
                    <span class="input-group-addon">分类名称</span>
                    <input type="text" class="form-control n_sort_name1" name="n_sort_name1">
                </div>
            </div>
            <div style="text-align: center">
                <button class="btn btn-large btn-default n_sort_submit" style="margin:10px auto">提交</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="update_n_sort">
    <div class="modal-dialog modal-lg" role="document" style="padding:10px;">
        <div class="modal-content">
            <div style="text-align: center">
                <h3 style="text-align: center">需求分类修改</h3>
            </div>
            <div class="form-group mt10">
                <div class="input-group">
                    <span class="input-group-addon">分类名称</span>
                    <input type="text" class="form-control n_sort_name2" name="n_sort_name2">
                </div>
            </div>
            <div style="text-align: center">
                <button class="btn btn-large btn-default n_sort_update" style="margin:10px auto">提交</button>
            </div>
        </div>
    </div>
</div>
</body>
<script src="/asset/web/js/use/index.js"></script>
</html>