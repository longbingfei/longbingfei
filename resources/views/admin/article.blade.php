<?php
$data = isset($_POST['data']) ? json_decode($_POST['data'],1) : [] ;
$count = $data['count'];
$data = $data['articles'];
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <style>
        .container{
            position:absolute;
            left:10px;
        }
        .checkbox,tr{
            cursor:pointer
        }
        .modal-body{
            position:relative;
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
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $key => $vo)
                <tr class="detail" data-id="{{$vo['id']}}">
                    <td title={{$vo['id']}}><input class="checkbox" type="checkbox" value="{{$vo['id']}}"></td>
                    <td>{{$vo['title']}}</td>
                    <td>{{$vo['status']}}</td>
                    <td>{{$vo['author_name']}}</td>
                    <td>{{$vo['created_at']}}</td>
                    <td>{{$vo['updated_at']}}</td>
                    <td>xxx</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
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
    function resetModal(){
        $("#form").data('id','');
        $("#title").val('');
        $("#content").val('');
    }
    $(".detail").bind("click",function(){
        $.getJSON("{{url('admin/feature/article')}}"+'/'+$(this).data('id'),function(data){
            $("#form").data('id',data.id);
            $("#title").val(data.title);
            $("#content").val(data.content);
        });
        $(".content").modal();
    });
    $(".submit").bind("click",function(){
        var id =  $("#form").data('id');
        if(id == ''){
            return false;
        }
        var title = $("#title").val();
        if($.trim(title) == ''){
            $("#title").css("border","1px solid red");
            return false;
        }
        var content = $("#content").val();
        if($.trim(content) == ''){
            $("#title").css("border","1px solid red");
            return false;
        }
        $.ajax({
            method:"PUT",
            url:"{{ url('admin/feature/article') }}"+'/'+id,
            data:{title:title,content:content},
            success:function(data){
                if(data == 1){
                    window.location.reload()
                }
            }
        });
    });
    $(".cancel").bind("click",resetModal);
</script>
</body>
</html>