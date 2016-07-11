<?php
$data = isset($_POST['data']) ? $_POST['data'] : [] ;
$count = $data['count'];
$data = $data['articles'];
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <style>
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
        <button class="btn btn-default newArticle">新建文稿</button>
        <table class="table">
            <thead>
                <tr>
                    <th>选择</th>
                    <th>标题</th>
                    <th>分类</th>
                    <th>状态</th>
                    <th>作者</th>
                    <th>创建于</th>
                    <th>更新于</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody class="tbd">
            @foreach($data as $key => $vo)
                <tr>
                    <td title="{{$vo['id']}}"><input class="checkbox" type="checkbox" value="{{$vo['id']}}"></td>
                    <td class="detail" data-id="{{$vo['id']}}">{{$vo['title']}}</td>
                    <td>{{$vo['sort_name']}}</td>
                    <td>{{$vo['status']}}</td>
                    <td>{{$vo['author_name']}}</td>
                    <td>{{$vo['created_at']}}</td>
                    <td>{{$vo['updated_at']}}</td>
                    <td class="delete" data-id="{{$vo['id']}}"><i class="glyphicon glyphicon-remove"></i></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <nav class="nav-right">
            <ul class="pagination">
                <li class="pre">
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="next">
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
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
    window.onload = paginate();
    //分页
    function paginate(){
        var count = Math.ceil("{{$count}}"/10); //10条一页
        for(var i=1;i<=count;i++) {
            var url = "{{ url('admin/feature/article') }}"+'?page='+i;
            var dom_li = $('<li><a class="page_a" href="javascript:void(0)" data-url="'+url+'">'+i+'</a></li>');
            $(".next").before(dom_li);
        }
    }
    $(".page_a").on('click',function(){
        $.getJSON($(this).data('url'),function(data){
            var html = '';
            $.each(data.articles,function(k,value){
                html+= '<tr>';
                html+= '<td title="'+value.id+'"><input class="checkbox" ' +
                        'type="checkbox" value="'+value.id+'"></td>';
                html+= '<td class="detail" data-id="'+value.id+'">'+value.title+'</td>';
                html+= '<td>'+value.sort_name+'</td>';
                html+= '<td>'+value.status+'</td>';
                html+= '<td>'+value.author_name+'</td>';
                html+= '<td>'+value.created_at+'</td>';
                html+= '<td>'+value.updated_at+'</td>';
                html+= '<td class="delete" data-id="'+value.id+'"><i class="glyphicon glyphicon-remove '+'delete"></i></td></tr>';
            });
            $(".tbd").html(html);
        });
    });
    //文稿新建修改
    var Article = {
        Message:{},
        Action : function (event){
            var data = event.data;
            Article.Message.method = data.method;
            Article.Message.url = data.url;
            switch(data.type){
                case 'create':
                    Article.CheckContent();
                    return Article.Send(Article.Message);
                    break;
                case 'update':
                    Article.CheckContent();
                    return Article.Send(Article.Message);
                    break;
                case 'delete':
                    return Article.Send(Article.Message);

            }
        },
        CheckContent:function(){
            if ($.trim($("#title").val()) == '') {
                $("#title").css("border", "1px solid red");
                return false;
            }
            Article.Message.title = $("#title").val();
            if ($.trim($("#content").val()) == '') {
                $("#content").css("border", "1px solid red");
                return false;
            }
            Article.Message.content = $("#content").val();
        },
        Send:function(data){
            $.ajax({
                method: data.method,
                url: data.url,
                data: {title:data.title,content:data.content},
                success: function (data) {
                    if (data == 1) {
                       window.location.reload()
                    }
                }
            });
        }
    }
    //更新文稿
    $("body").on("click",".detail",function(){
        $.getJSON("{{url('admin/feature/article')}}"+'/'+$(this).data('id'),function(data){
            $("#form").data('id',data.id);
            $("#title").val(data.title);
            $("#content").val(data.content);
            $(".content").modal();
            data.type = 'update';
            data.url = "{{url('admin/feature/article')}}"+'/'+data.id;
            data.method = 'PUT';
            $(".submit").on('click',data,Article.Action);
        });
    });

    function resetModal(){
        $("#form").data('id','');
        $("#title").val('');
        $("#content").val('');
    }
    $(".cancel").on("click",resetModal);

    //新建文稿
    $(".newArticle").on('click',function(){
        $(".content").modal();
        var data = {};
        data.type = 'create';
        data.url = "{{url('admin/feature/article')}}";
        data.method = 'POST';
        $(".submit").on('click',data,Article.Action);
    });

    //删除文稿
    $("body").on("click",".delete",function(){
        var data = {};
        data.type = 'delete';
        data.url = "{{url('admin/feature/article')}}"+'/'+$(this).data('id');
        data.method = 'DELETE';
        var event = {};
        event.data = data;
        Article.Action(event);
    });
</script>
</body>
</html>