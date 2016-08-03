<?php
$data = isset($_POST['data']) ? $_POST['data'] : [] ;
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .panel{
            /*box-shadow: 0 0 6px #0D3349;*/
        }
        .product-main{
            overflow: hidden;
            width:100%;
            box-shadow: 0 0 6px #0D3349;
        }
        .product-table tr td{
            vertical-align: middle !important;
        }
        .product-table tr:first-child td{
            font-size: 16px;
            font-weight: 400;
        }
        td img{
            width:80px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="panel panel-default">
        <a class="btn btn-primary new-product-a">新建</a>
    </div>
    <div class="product-main">
        <table class="table table-hover product-table">
            <tr class="active">
                <td>选择</td>
                <td>展示</td>
                <td>名称</td>
                <td>分类</td>
                <td>创建时间</td>
                <td>更新时间</td>
                <td>操作人</td>
                <td>操作</td>
            </tr>
            @foreach($data as $item => $value)
            <tr>
                <td><input type="checkbox"></td>
                <td><img src="{{url('images/2016/06/14/14658833420537.jpeg')}}"></td>
                <td>{{$value['name']}}</td>
                <td>{{$value['sort_id']}}</td>
                <td>{{$value['created_at']}}</td>
                <td>{{$value['updated_at']}}</td>
                <td>{{$value['user_id']}}</td>
                <td>xxx</td>
            </tr>
            @endforeach
        </table>
        {{--<div class="product-item">--}}
            {{--<img src="{{url('default/images/default_avatar.jpeg')}}">--}}
        {{--</div>--}}
        <div class="panel panel-default">
            <a class="btn btn-default ">上一页</a>
            1/2
            <a class="btn btn-default ">下一页</a>
        </div>
    </div>
</div>
{{--modal--}}
<div class="container">
    <div class="modal fade modal-product" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close product-cancel" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">添加</h4>
                </div>
                <form id="product-form" action="#">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="product-sort" class="control-label">分类</label>
                            <select class="form-control" id="product-sort">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product-name" class="control-label">名称:</label>
                            <input type="text" class="form-control" id="product-name">
                        </div>
                        <div class="form-group">
                            <label for="product-describe" class="control-label">描述:</label>
                            <input type="text" class="form-control" id="product-describe">
                        </div>
                        <div class="form-group">
                            <label for="product-price" class="control-label">几何:</label>
                            <input type="text" class="form-control" id="product-price">
                        </div>
                        <div class="form-group">
                            <label for="product-storage" class="control-label">库存:</label>
                            <input type="text" class="form-control" id="product-storage">
                        </div>
                        <div class="form-group">
                            <label >图片:</label>
                            <div class="image-upload-div"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default product-cancel" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-primary submit">添加</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
//    用Object.keys(obj).length
//    splice(index,length,var)
//    delete obj.value
    $("body").on("click",".new-product-a",function(){
        $.getJSON("{{'feature/product_sort'}}",function(sort){
            var select = $("#product-sort");
                select.empty();
            $.each(sort,function(k,v){
                var option = $("<option>"+ v.name +"</option>").val(v.id);
                select.append(option);
            });
        });
        $(".modal-product").modal();
        UploadPic.Init($(".image-upload-div"));
        $(".submit").on('click',function(){
            var images = UploadPic.Send('商品图片',3);
            if(images.length){
                var form = new FormData;
                var productSort = $.trim($("#product-sort").val());
                var productName = $.trim($("#product-name").val());
                var productDescribe = $.trim($("#product-describe").val());
                var productPrice = $("#product-price").val();
                var productStorage = $("#product-storage").val();
                form.append('sort_id',productSort);
                form.append('name',productName);
                form.append('describe',productDescribe);
                form.append('price',productPrice);
                form.append('storage',productStorage);
                form.append('images',JSON.stringify(images));
                $.ajax({
                    method:'POST',
                    url:"{{'feature/product'}}",
                    data:form,
                    processData:false,
                    contentType:false,
                    success:function(data){
                        if(data == 1){
                            location.reload();
                        }
                    }
                });
            }
        });
        $(".product-cancel").on('click',function(){
            UploadPic.Reset();
            $("#product-form")[0].reset();
        })
    })
</script>
</body>
</html>