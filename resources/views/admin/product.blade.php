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
                        <button type="button" class="btn btn-default product-cancel" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-primary submit">添加</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
//    this:调用者
//    类数组:obj.length undefined
//    用Object.keys(obj).length
//    splice(index,length,var)
//    delete obj.value
    var ProductPic = {
            i:0,
            uploadFiles:{},
            Preview:function(obj){
                var file = obj.context.files[0];
                this.uploadFiles[this.i] = file;
                var Reader = new FileReader();
                Reader.readAsDataURL(file);
                Reader.onload = function(e){
                    var that = ProductPic;
                    var url = e.target.result;
                    var newDom = $("<div data-id="+that.i+"></div>").addClass("upload-button-div show-product-pic").css
                    ({backgroundImage:"url" +
                    "("+url+")",backgroundSize:"100% 100%"}).append($("<div>x</div>").css({
                        position:"absolute",
                        top:"0px",
                        right:"0px",
                        width:"10px",
                        height:"10px",
                        lineHeight:"10px",
                        color:"white",
                        cursor:"pointer",
                    }).addClass("cancel_upload"));
                    $(".show-product").prepend(newDom);
                    that.i++;
                }
            },
            Hover:function(type,obj){
                switch(type){
                    case "show":
                            var showPicDiv = $("<div></div>").css({
                                width:"300px",
                                height:"300px",
//                                borderRadius:"10px",
                                position:"absolute",
                                right:"30%",
                                bottom:"112px",
                                backgroundImage:obj.css("backgroundImage"),
                                backgroundSize:"100% 100%",
                                zIndex:9999
                            });
                            showPicDiv.addClass('previewPic');
                            $(".modal-body").append(showPicDiv);
                        break;
                    case "hidden":
                            $(".modal-body").find(".previewPic").remove();
                        break;
                }
            },
            Delete:function(obj){
                var id = obj.parent().data("id");
                delete this.uploadFiles[id];
                $("#product-preview").val(''); //删除一个,重置file
                obj.parent().remove();
            },
            Send:function(){
                var productSort = $.trim($("#product-sort").val());
                var productName = $.trim($("#product-name").val());
                var productDescribe = $.trim($("#product-describe").val());
                var productPrice = $("#product-price").val();
                var productStorage = $("#product-storage").val();
                var images = [];
                $.each(this.uploadFiles,function(x,v){
                    var form = new FormData;
                    form.append('name','商品图片');
                    form.append('sort_id',3);
                    form.append('image',v);
                    $.ajax({
                        method:'POST',
                        async:false, //同步
                        url:"{{'feature/image'}}",
                        data:form,
                        processData:false,
                        contentType:false,
                        success:function(data){
                            if(data.id > 0){
                                images.push(data);
                            }
                        }
                    });
                });
                var form = new FormData;
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
            },
            Reset:function(){
                $(".show-product").find(".show-product-pic").remove();
                this.i = 0;
                this.uploadFiles = {};
            }
    }
    $("body").on("click",".new-product-a",function(){
        //获取分类
        $.getJSON("{{'feature/product_sort'}}",function(sort){
            var select = $("#product-sort");
                select.empty();
            $.each(sort,function(k,v){
                var option = $("<option>"+ v.name +"</option>").val(v.id);
                select.append(option);
            });
        });
        //modal
        $(".modal-product").modal();

        //preview
        $("body").on("change","#product-preview",function(){
            ProductPic.Preview($(this));
        });

        //delete preview
        $("body").on("click",".cancel_upload",function(){
            ProductPic.Delete($(this));
        });

        //hover
        $("body").on("mouseover mouseout",".show-product-pic",function(e){
           if(e.type == "mouseover"){
                ProductPic.Hover('show',$(this));
           }else if(e.type == "mouseout"){
                ProductPic.Hover('hidden',$(this));
           }
        });

        //create
        $(".submit").on('click',function(){
            ProductPic.Send();
        });

        //cancel
        $(".product-cancel").on('click',function(){
            ProductPic.Reset();
            $("#product-form")[0].reset();
        })
    })
</script>
</body>
</html>