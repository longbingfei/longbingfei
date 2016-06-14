<?php
$data = isset($_POST['data']) ? $_POST['data'] : [] ;
//print_r($data['carousel']);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <style>
    </style>
</head>
<body>
<div class="container">
</div>
{{--modal--}}
<div class="container">
    <div class="modal fade content" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg"> {{--modal-sm modal-lg  style="width:???px"--}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close cancel" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">文稿</h4>
                </div>
                <div class="modal-body">
                    <form id="form" data-id="xxx">
                        <div class="form-group">
                            <label for="title" class="control-label">标题:</label>
                            <input type="text" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                            <label for="content" class="control-label">内容:</label>
                            <textarea class="form-control" id="content" rows="20"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default cancel" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary submit">保存</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
</body>
</html>