<?php
$data = isset($_POST['data']) ? $_POST['data'] : [] ;
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .panel{
        }
        .product-main{
            border:1px solid grey;
            height:800px;
            width:100%;
        }
        .product-main div{
            border:1px solid grey;
            width:150px;
            float:left;
            height:200px;
            margin-left:10px;
            margin-top:10px;
            overflow: hidden;
            position:relative;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="panel panel-default">
        <a class="btn btn-primary new-product-a">新建</a>
    </div>
    <div class="product-main">
        <div class="product-item">
            <img src="{{url('default/images/default_avatar.jpeg')}}">
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
    $("body").on("mouseover mouseout",".product-item",function(e){
        Product.Show($(".product-item"), e.type);
    })
</script>
</body>
</html>