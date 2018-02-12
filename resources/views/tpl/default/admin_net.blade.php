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
<form id="net_update_form">
    <div class="z7">
        <dl>
            <dt>轮播图片替换:
                <button type="button" id="qiniu1">上传图片</button>
                <span style="font-size: 13px;">(仅允许上传5张图片)</span></dt>
            <dd class="p_img_dd1" style="height:150px;border:1px solid #eaeaea;margin-left: 0px">
                @foreach($c_images as $vo)
                    <div class="dd_wrap_div">
                        <span class="glyphicon glyphicon-remove-circle dd_img_delete"></span>
                        <img src="{{$vo}}">
                        <input type="hidden" name="index_images[]" value="{{$vo}}">
                    </div>
                @endforeach
            </dd>
        </dl>
    </div>
    <div class="z7">
        <dl>
            <dt>登录注册图片替换:
                <button type="button" id="qiniu2">上传图片</button>
                <span style="font-size: 13px;">(仅允许上传1张图片)</span></dt>
            <dd class="p_img_dd2" style="height:150px;border:1px solid #eaeaea;margin-left: 0px">
                <div class="dd_wrap_div">
                    <span class="glyphicon glyphicon-remove-circle dd_img_delete"></span>
                    <img src="{{$login_image}}">
                    <input type="hidden" name="login_image" value="{{$login_image}}">
                </div>
            </dd>
        </dl>
    </div>
</form>
<div style="text-align: center">
    <button class="btn btn-large btn-default btn_net_update" style="margin-bottom: 10px" data-toggle="modal"
            data-target=".bs-example-modal-lg">确认修改
    </button>
</div>
<iframe id="id_iframe" name="nm_iframe" style="display:none;"></iframe>
</body>
<script>
    var user_id = '{{session("id")}}',
        qiniu_access_token = '{{$qiniu_access_token}}',
        qiniu_img_domain = '{{$qiniu_img_domain}}',
        tmp_img_data = null;
</script>
<script src="/asset/web/js/use/index.js"></script>
</html>