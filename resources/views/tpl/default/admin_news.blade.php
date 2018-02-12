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
    <link href="{{url('editor/themes/default/css/umeditor.css')}}" type="text/css" rel="stylesheet">
    <script src="/asset/web/plugins/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="/asset/web/css/index11.css">
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf-8" src="{{url('editor/umeditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{url('editor/umeditor.min.js')}}"></script>
    <script type="text/javascript" src="{{url('editor/lang/zh-cn/zh-cn.js')}}"></script>
    <style>
        .edui-container, #describe1, #describe2, .edui-toolbar {
            width: 100% !important;
            box-shadow: 0 0 0 0;
        }
    </style>
</head>
<body>
<button class="btn btn-large btn-default" style="margin-bottom: 10px" data-toggle="modal"
        data-target=".bs-example-modal-lg">新增
</button>
<table class="table">
    <tr>
        <th>序号</th>
        <th>标题</th>
        <th>状态</th>
        <th>创建时间</th>
        <th>操作</th>
    </tr>
    @foreach($data as $key=>$vo)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$vo->title}}</td>
            <td>{{$vo->is_promote ? '已发布' : '未发布'}}</td>
            <td>{{$vo->created_at}}</td>
            <td>
                @if(!$vo->is_promote)
                    <button class="btn btn-xs btn-danger admin_need_approve admin_change_news_status"
                            data-status="{{$vo->is_promote}}"
                            data-id="{{$vo->id}}">发布
                    </button>
                @else
                    <button class="btn btn-xs btn-danger admin_need_back admin_change_news_status"
                            data-status="{{$vo->is_promote}}"
                            data-id="{{$vo->id}}">撤销
                    </button>
                @endif
                <button class="btn btn-xs btn-info admin_news_edit"
                        data-id="{{$vo->id}}">修改
                </button>
                <button class="btn btn-xs btn-success admin_news_delete" data-status="{{$vo->is_promote}}"
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
                <h3 style="text-align: center">资讯新增</h3>
            </div>
            <div class="form-group mt10">
                <div class="input-group">
                    <span class="input-group-addon">标题</span>
                    <input type="text" class="form-control title1" name="title1">
                </div>
            </div>
            <script type="text/plain" id="describe1"></script>
            <div style="text-align: center">
                <button class="btn btn-large btn-default news_add_submit" style="margin:10px auto">提交</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="update_news">
    <div class="modal-dialog modal-lg" role="document" style="padding:10px;">
        <div class="modal-content">
            <div style="text-align: center">
                <h3 style="text-align: center">资讯修改</h3>
            </div>
            <div class="form-group mt10">
                <div class="input-group">
                    <span class="input-group-addon">标题</span>
                    <input type="text" class="form-control title2" name="title2">
                </div>
            </div>
            <script type="text/plain" id="describe2"></script>
            <div style="text-align: center">
                <button class="btn btn-large btn-default news_update_submit" style="margin:10px auto">提交</button>
            </div>
        </div>
    </div>
</div>
</body>
<script src="/asset/web/js/use/index.js"></script>
<script>
    var um1 = UM.getEditor('describe1'),
        um2 = UM.getEditor('describe2');
</script>
</html>