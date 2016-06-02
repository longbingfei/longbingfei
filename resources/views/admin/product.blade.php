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
                    <form class="product-form" action="{{'product'}}" method="post"
                          enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="sort" class="control-label">分类</label>
                            <select class="form-control" id="sort">
                                <option value="1">123</option>
                                <option value="2">234</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title" class="control-label">名称:</label>
                            <input type="text" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                            <label for="describe" class="control-label">描述:</label>
                            <input type="text" class="form-control" id="describe">
                        </div>
                        <div class="form-group">
                            <label for="price" class="control-label">几何:</label>
                            <input type="text" class="form-control" id="price">
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
                    </form>
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
    $("body").on("click",".new-product-a",function(){
        $(".modal-product").modal();
        $("body").on("change","#product-preview",function(){
            ProductPic.Preview($(this));
        });
        $("body").on("click",".cancel_upload",function(){
            var file_id = $(this).parent().data("id");
            upload_files.files.splice(file_id,1);
            $(this).parent().remove();
        });
        $(".submit").on('click',function(){
            $(".product-form").submit();
        });

    })
    var upload_files = {i:0,files:[]};
    var ProductPic = {
            Preview:function(obj){
                var file = obj.context.files[0];
                upload_files.files.push(file);
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
                }
            },
            Send:function(){

        }
    }
</script>
</body>
</html>