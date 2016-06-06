<!DOCTYPE html>
<html>
<head>
    <style>
        .show-product{
            border:1px solid darkgrey;
            /*border-radius: 1em;*/
        }
        .show-product .upload-button-div{
            position: relative;
            float:left;
            width:80px;
            height:80px;
            z-index: 999;
        }
        .mark_{
            position:relative;
        }
        #product-preview{
            position: absolute;
            top:0px;
            left:0px;
            width:80px;
            height:80px;
            opacity: 0;
        }
        .plus-x{
            position:absolute;
            width:20px;
            height:2px;
            top:39px;
            left:30px;
            border:1px solid darkgrey;
        }
        .plus-y{
            position:absolute;
            width:2px;
            height:20px;
            top:30px;
            left:39px;
            border:1px solid darkgrey;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="panel panel-default">
        <a class="btn btn-primary new-product-a">新建</a>
    </div>
</div>
{{--modal--}}
<div class="container">
    <div class="modal fade modal-product" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">添加</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="product-sort" class="control-label">分类</label>
                        <select class="form-control" id="product-sort">
                            <option value="1">123</option>
                            <option value="2">234</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product-title" class="control-label">名称:</label>
                        <input type="text" class="form-control" id="product-title">
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
                        <label for="product-preview" class="control-label">图片:</label>
                        <div class="show-product">
                            <div class="upload-button-div">
                                <div class="mark_">
                                    <div class="plus-x"></div>
                                    <div class="plus-y"></div>
                                </div>
                                <input id="product-preview" type="file" name="file[]">
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default cancel" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary submit">添加</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var upload_files = {i:0,files:[]};
    var ProductPic = {
            Preview:function(obj){
                var file = obj.context.files[0];
                upload_files.files[upload_files.i] = file;
                var Reader = new FileReader();
                Reader.readAsDataURL(file);
                Reader.onload = function(e){
                    var url = e.target.result;
                    var newDom = $("<div data-id="+upload_files.i+"></div>").addClass("upload-button-div").css
                    ({backgroundImage:"url" +
                    "("+url+")",backgroundSize:"100% 100%"}).append($("<div>x</div>").css({
                        position:"absolute",
                        top:"0px",
                        right:"0px",
                        width:"10px",
                        height:"10px",
                        lineHeight:"10px",
                        color:"white",
                        cursor:"pointer"
                    }).addClass("cancel_upload"));
                    $(".show-product").prepend(newDom);
                    upload_files.i++;
                    console.log(upload_files.files,upload_files.i);
                }
            },
            Delete:function(obj){
                var file_id = obj.parent().data("id");
                upload_files.files.splice(file_id,1);
                obj.parent().remove();
            },
            Send:function(){
                if(upload_files.files.length <1){
                    return false;
                }
                var productSort = $.trim($("#product-sort").val());
                var productTitle = $.trim($("#product-title").val());
                var productDescribe = $.trim($("#product-describe").val());
                var productPrice = $("#product-price").val();
                var form = new FormData;
                form.append('sort_id',1);
                form.append('title',productTitle);
                form.append('describe',productDescribe);
                form.append('price',productPrice);
                $.each(upload_files.files,function(x,v){form.append('file[]',v)});
                $.ajax({
                    method:'POST',
                    url:"{{'feature/product'}}",
                    data:form,
                    processData:false,
                    contentType:false,
                    success:function(data){
                        console.log(data);
//                        window.location.reload();
                    }
                });
            }
    }
    $("body").on("click",".new-product-a",function(){
        $(".modal-product").modal();
        $("body").on("change","#product-preview",function(){
            ProductPic.Preview($(this));
        });
        $("body").on("click",".cancel_upload",function(){
            ProductPic.Delete($(this));
        });
        $(".submit").on('click',function(){
            ProductPic.Send();
        });
    })
</script>
</body>
</html>