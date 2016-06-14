/**
 * Created by zhangxian on 16/6/14.
 */
var Tool = {
    Alert:function(obj,message){
        var alertDom =
            '<div class="alert alert-warning" role="alert">'+
            '<div>'+message+'</div>'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">x</span>'+
            '</button>'+
            '</div>';
        $(alertDom).css({width:"100%",height:"100%"});
        obj.append($(alertDom));
    }
};
var UploadPic = {
    i:0,
    uploadFiles:{},
    Show:function(obj){
        var file = obj.context.files[0];
        this.uploadFiles[this.i] = file;
        var Reader = new FileReader();
        Reader.readAsDataURL(file);
        Reader.onload = function(e){
            var that = UploadPic;
            var url = e.target.result;
            var newDom = $("<div data-id="+that.i+"></div>")
                .addClass("plug-upload-div")
                .css({backgroundImage:"url" + "("+url+")",backgroundSize:"100% 100%"})
                .append($("<div>x</div>").addClass("plug-cancel-style"));
            $(".plug-show-div").prepend(newDom);
            $(".plug-upload-div").on('mouseover mouseout',function(e){
                that.Preview(e,$(this));
            });
            $(".plug-cancel-style").on('click',function(){
                that.Delete($(this));
            })
            that.i++;
        }
    },
    //type进出;obj源;
    Preview:function(e,obj){
        switch(e.type){
            case "mouseover":
                var showPicDiv = $("<div></div>").css({
                    "backgroundImage":obj.css("backgroundImage"),
                    left: e.pageX,
                    top: e.pageY
                }).addClass("plug-preview-div plug-preview-pic");
                $("body").append(showPicDiv);
                break;
            case "mouseout":
                $("body").find(".plug-preview-pic").remove();
                break;
        }
    },
    Send:function(name,sortId){
        var images = [];
        $.each(this.uploadFiles,function(x,v){
            var form = new FormData;
            form.append('name',name);
            form.append('sort_id',sortId);
            form.append('image',v);
            $.ajax({
                method:'POST',
                async:false, //同步
                url:"feature/image",
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

        return images;
    },
    Delete:function(obj){
        var id = obj.parent().data("id");
        delete this.uploadFiles[id];
        $("#plug-upload-input").val('');
        obj.parent().remove();
    },
    Reset:function(){
        $(".plug-show-div").find(".plug-upload-div").remove();
        this.i = 0;
        this.uploadFiles = {};
    },
    Init:function(obj){
        var showDiv =
            '<div class="plug-show-div">'+
            '<div class="plug-upload-div">'+
            '<div class="plug-mark">'+
            '<div class="plug-plus-x"></div>'+
            '<div class="plug-plus-y"></div>'+
            '</div>'+
            '<input id="plug-upload-input" type="file" name="image[]">'+
            '</div>'+
            '<div style="clear:both;"></div>'+
            '</div>';
        $(obj).empty().append(showDiv);
        $("#plug-upload-input").on('change',function(){
            UploadPic.Show($(this));
        });
    }
};
var Frame = {
    Load : function (e){
        var dataUrl = e.data.dataUrl;
        var loadUrl = e.data.loadUrl;
        $(".menu li").removeClass("active");
        $(this).addClass("active");
        $.getJSON(dataUrl,function(data){
            $(".main").empty().load(loadUrl,{"data":data});
        });
    }
};