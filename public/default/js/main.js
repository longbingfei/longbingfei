/**
 * Created by zhangxian on 16/6/14.
 */
//页面数据加载与跳转
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

//警告框
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

//图片上传与显示
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

//Product
var Product = {
    Show:function(obj,mouseStatus){
        switch(mouseStatus){
            case 'mouseover':
                console.log(obj.children('img').css('left'));
                break;
            case 'mouseout':
                obj.css({border:"1px solid black"});
                break;
        }

    }
};

//视频播放器
var Video = {
    Init : function(data) {
        var obj = data.obj||$("body");
        var id = data.id || "video_div";
        var width = data.width || "300px";
        var height = data.height || "200px";
        var src = data.src||'none';
        var video = $("<video id="+id+">浏览器不支持h5video标签</video>").css({width: width, height: height,backgroundColor:"black"}).attr({src:src});
        if(data.controls){
            video.attr({controls:"controls"});
        }
        video.appendTo(obj);
    },
    Controls_init:function(obj) {
        var controlBox = $("<div></div>").css({
            width: obj.width(),
            padding: "10px",
            position: "relative"
        });
        obj.wrap(controlBox);
        var toolBar = $("<div class='toolBar'><div><div></div><div></div><div></div></div></div>").css({
            width: obj.width(),
            height: "0px",
            position: "absolute",
            bottom: "10px",
            textAlign:"center",
            overflow:"hidden",
            backgroundColor:"black"
        });
        var innerDiv = toolBar.children('div:eq(0)');
            innerDiv.css({width:obj.width()-40,height:"60px",margin:"0 auto"});
            innerDiv.children('div:eq(0)').css({
                width:"60px",
                height:"60px",
                float:"left",
                fontSize:"20px",
                lineHeight:"60px",
                backgroundColor:"cyan"
            }).addClass("glyphicon glyphicon-play");
            innerDiv.children('div:eq(2)').css({
                width:"60px",
                height:"60px",
                float:"left",
                fontSize:"14px",
                backgroundColor:"grey"
        });
        innerDiv.children('div:eq(1)').css({
            width:(100-12000/innerDiv.width())+"%",
            height:"60px",
            float:"left",
            backgroundColor:"yellow"
        }).addClass('progress_');
        var infoBar = $("<div></div>").css({
            width: obj.width(),
            height: obj.height() - 60,
            position: "absolute",
            top: "10px",
            zIndex:10
        });
        var pushMark = $("<div class='pushMark'></div>").css({
            width: "100px",
            height: "100px",
            position: "absolute",
            top: obj.height() / 2 - 50,
            left: obj.width() / 2 - 60,
            backgroundImage: "url('http://img.dev.hogesoft.com:233/material/livmedia/img/2016/06/20160621130125hcLM.jpg')",
            backgroundSize: "100% 100%",
            cursor: "pointer"
        });
        infoBar.append(pushMark);
        obj.before(infoBar).after(toolBar);
        this.Controls(obj.parent());
    },
    Controls:function(obj){
        var video = obj.children('video');
        var infobar = obj.children('div:eq(0)');
        console.log(video);
        if(video[0].paused){
            $("body").on('click',video,function(){
                    infobar.css({display:'none'});
                    video[0].play();
                $("body").on('click',video,function(){
                    video[0].pause();
                    infobar.css({display:'block'});
                })
            })
        }else{
            $("body").on('click',video,function(){
                video[0].pause();
                infobar.css({display:'block'});
                $("body").on('click',video,function(){
                    infobar.css({display:'none'});
                    video[0].play();
                })
            })
        }
        obj.children('video').on('loadedmetadata',function(){
            $(this).on('mouseover',function(){
                $(".toolBar").stop(1).animate({height:"60px"},500);
            });
            var dom = $("<div><div><div><div></div></div>").css({height:"20px",width:"100%",border:"1px solid blue"});
            dom.children("div:eq(0)").css({height:"20px",width:"20px",backgroundColor:"red"});
            dom.children("div:eq(1)").css({height:"20px",width:dom.width()-20,backgroundColor:"green"});
            $(".toolBar").children("div:eq(1)").append(dom);
        });
    }

};

//富文本编辑器
var TextEidt = {

};