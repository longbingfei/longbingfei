/**
 * Created by zhangxian on 16/6/14.
 */
//页面数据加载与跳转
var Frame = {
    Load: function (e) {
        var dataUrl = e.data.dataUrl;
        var loadUrl = e.data.loadUrl;
        $(".menu li").removeClass("active");
        $(this).addClass("active");
        $.getJSON(dataUrl, function (data) {
            $(".main").empty().load(loadUrl, {"data": data});
        });
    }
};

//警告框
var Tool = {
    Alert: function (obj, message) {
        var alertDom =
            '<div class="alert alert-warning" role="alert">' +
            '<div>' + message + '</div>' +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
            '<span aria-hidden="true">x</span>' +
            '</button>' +
            '</div>';
        $(alertDom).css({width: "100%", height: "100%"});
        obj.append($(alertDom));
    }
};

//弹出框 msg:{title,message,callback}
var Confirm = function (msg) {
    if (!msg || !msg.message) {
        return false;
    }
    var coverDiv = $("<div></div>").css({
        width: $(document).width(),
        height: $(document).height(),
        position: "absolute",
        top: 0,
        backgroundColor: "black",
        opacity: "0.6",
        zIndex: 98
    }).addClass("msg_modal");
    var confirmDiv = $("<div></div>").css({
        width: "400px",
        height: "200px",
        backgroundColor: "white",
        boxShadow: "1px 1px 3px 3px #337ab7",
        position: "absolute",
        left: $(window).width() / 2 - 200,
        top: $(window).height() / 2 - 100,
        textAlign: "center",
        fontColor: 'grey',
        zIndex: 99
    }).addClass("msg_modal");
    var confirmBody = "<h4><span class='glyphicon glyphicon-exclamation-sign' style='color:indianred'></span>&nbsp&nbsp" +
        (msg && msg.title ? msg.title : '提示') + "</h4><hr style='margin:4px 4px" +
        " !important;'/>" +
        "<div style='width:300px;height:100px;margin:0 auto;line-height:100px'>" + msg.message +
        "</div><hr style='margin:4px 4px !important;' />" +
        "<div><botton class='btn btn-default btn-cancel' style='margin-right: 60px'>取消</botton>" +
        "<botton class='btn btn-default btn-submit'>确定</botton></div>";
    $("body").append(coverDiv).append(confirmDiv.append(confirmBody));
    $(".msg_modal").on('click', '.btn', function () {
        if ($(this).hasClass('btn-cancel')) {
            $("body").find(".msg_modal").remove();
        } else if ($(this).hasClass('btn-submit')) {
            $("body").find(".msg_modal").remove();
            (typeof msg.callback == 'function') ? msg.callback() : '';
        }
    });
};

//图片轮播obj:{images:json,payload:dom}
var Carousel = {
    init: function (obj) {
        var max = 8;
        var images = obj.images;
        var payload = obj.payload;
        if (!images || !images.length || !payload) {
            return false;
        }
        var carouselDiv = $("<div></div>").css({
            width: payload.width() > 320 ? payload.width() : 320,
            height: payload.height() > 240 ? payload.height() : 240
        }).addClass("carousel");
        var carouselListDiv = $("<div></div>").addClass("carousel-list");
        $.each(images, function (x, y) {
            if (x < max) {
                var item = carouselListDiv.clone().css({
                    left: 45 * x,
                    backgroundImage: 'url(' + y.thumb + ')'
                }).data({src: y.path, id: x});
                carouselDiv.append(item);
            }
        });
        var img = $("<img>").css({
            width: carouselDiv.width(),
            height: carouselDiv.height()
        });
        img.attr('src', images[0].path).data('id', 0);
        img.appendTo(carouselDiv);
        payload.append(carouselDiv);
        $(".carousel-list").mouseover(function () {
            img.attr('src', $(this).data('src')).data('id', $(this).data('id'));
        });
        setInterval(function () {
            Carousel.action(images);
        }, 3000);
    },
    action: function (images) {
        var img_ = $(".carousel").children("img")[0];
        var id = $(img_).data('id');
        id = id < images.length - 1 ? id + 1 : 0;
        $(img_).attr('src', images[id].path).data('id', id);
    }
};

//联系助手
var Helper = {
    init: function (obj) {
        var connectDiv = $("<div></div>").css({
            width: "120px",
            height: "200px",
            position: "fixed",
            marginTop: "80px",
            marginLeft: "1px",
            boxShadow: "0px 0px 2px 3px orange",
            zIndex: 99
        });
        var rowDiv = $("<div></div>").css({
            width: "100px",
            height: "25px",
            margin: "10px auto",
            boxShadow: "0px 0px 2px 2px orange",
            textAlign: "center",
            lineHeight: "25px",
            cursor: "pointer",
            color: "orange"
        }).addClass("clickDiv");
        connectDiv.on('click', ".clickDiv", function () {
            Helper.slide($(this));
        });
        connectDiv.append(
            rowDiv.clone().addClass("tel").html('联系方式'),
            rowDiv.clone().addClass("qq").html('QQ'),
            rowDiv.clone().addClass("wechat").html('微信')
        );
        var dom = obj ? obj : $("body");
        dom.append(connectDiv);
        $(".tel").click();
    },
    slide: function (obj) {
        var showDiv = $("<div></div>").css({
            width: "100px",
            height: "80px",
            margin: "10px auto",
            display: "block",
            fontSize: "13px",
            boxShadow: "0px 0px 2px 2px orange"
        }).addClass("showDiv");
        var html;
        if (obj.hasClass("tel")) {
            html = "哈哈哈";
        } else if (obj.hasClass("qq")) {
            html = "hehe";
        } else {
            html = "额";
        }
        showDiv.html(html);
        if (!obj) {
            return false;
        }
        obj.parent().find(".showDiv").remove();
        obj.after(showDiv);
    }
};

//图片上传与显示
var UploadPic = {
    i: 0,
    uploadFiles: {},
    Show: function (obj) {
        var file = obj.context.files[0];
        this.uploadFiles[this.i] = file;
        var Reader = new FileReader();
        Reader.readAsDataURL(file);
        Reader.onload = function (e) {
            var that = UploadPic;
            var url = e.target.result;
            var newDom = $("<div data-id=" + that.i + "></div>")
                .addClass("plug-upload-div")
                .css({backgroundImage: "url" + "(" + url + ")", backgroundSize: "100% 100%"})
                .append($("<div>x</div>").addClass("plug-cancel-style"));
            $(".plug-show-div").prepend(newDom);
            $(".plug-upload-div").on('mouseover mouseout', function (e) {
                that.Preview(e, $(this));
            });
            $(".plug-cancel-style").on('click', function () {
                that.Delete($(this));
            });
            that.i++;
        };
    },
    Preview: function (e, obj) {
        switch (e.type) {
            case "mouseover":
                var showPicDiv = $("<div></div>").css({
                    "backgroundImage": obj.css("backgroundImage"),
                    left: e.pageX,
                    top: e.pageY - 300
                }).addClass("plug-preview-div plug-preview-pic");
                $("body").append(showPicDiv);
                break;
            case "mouseout":
                $("body").find(".plug-preview-pic").remove();
                break;
        }
    },
    //单个图片
    Send: function (name, sortId) {
        var images = [];
        $.each(this.uploadFiles, function (x, v) {
            var form = new FormData;
            form.append('name', name);
            form.append('sort_id', sortId);
            form.append('image', v);
            $.ajax({
                method: 'POST',
                async: false, //同步
                url: "feature/image",
                data: form,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.id > 0) {
                        images.push(data);
                    }
                }
            });
        });

        return images;
    },
    Delete: function (obj) {
        var id = obj.parent().data("id");
        delete this.uploadFiles[id];
        $("#plug-upload-input").val('');
        obj.parent().remove();
    },
    Reset: function () {
        $(".plug-show-div").find(".plug-upload-div").remove();
        this.i = 0;
        this.uploadFiles = {};
    },
    Init: function (obj) {
        this.Reset();
        var showDiv =
            '<div class="plug-show-div">' +
            '<div class="plug-upload-div">' +
            '<div class="plug-mark">' +
            '<div class="plug-plus-x"></div>' +
            '<div class="plug-plus-y"></div>' +
            '</div>' +
            '<input id="plug-upload-input" type="file" name="image[]">' +
            '</div>' +
            '<div style="clear:both;"></div>' +
            '</div>';
        $(obj).empty().append(showDiv);
        $("#plug-upload-input").on('change', function () {
            UploadPic.Show($(this));
        });
    }
};

//视频播放器
var Video = {
    Init: function (data) {
        var obj = data.obj || $("body");
        var id = data.id || "video_div";
        var width = data.width || "300px";
        var height = data.height || "200px";
        var src = data.src || 'none';
        var video = $("<video id=" + id + ">浏览器不支持h5video标签</video>").css({
            width: width,
            height: height,
            backgroundColor: "black"
        }).attr({src: src});
        if (data.controls) {
            video.attr({controls: "controls"});
        }
        video.appendTo(obj);
    },
    Controls_init: function (obj) {
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
            textAlign: "center",
            overflow: "hidden",
            backgroundColor: "black"
        });
        var innerDiv = toolBar.children('div:eq(0)');
        innerDiv.css({width: obj.width() - 40, height: "60px", margin: "0 auto"});
        innerDiv.children('div:eq(0)').css({
            width: "60px",
            height: "60px",
            float: "left",
            fontSize: "20px",
            lineHeight: "60px",
            backgroundColor: "cyan"
        }).addClass("glyphicon glyphicon-play");
        innerDiv.children('div:eq(2)').css({
            width: "60px",
            height: "60px",
            float: "left",
            fontSize: "14px",
            backgroundColor: "grey"
        });
        innerDiv.children('div:eq(1)').css({
            width: (100 - 12000 / innerDiv.width()) + "%",
            height: "60px",
            float: "left",
            backgroundColor: "yellow"
        }).addClass('progress_');
        var infoBar = $("<div></div>").css({
            width: obj.width(),
            height: obj.height() - 60,
            position: "absolute",
            top: "10px",
            zIndex: 10
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
    Controls: function (obj) {
        var video = obj.children('video');
        var infobar = obj.children('div:eq(0)');
        if (video[0].paused) {
            $("body").on('click', video, function () {
                infobar.css({display: 'none'});
                video[0].play();
                $("body").on('click', video, function () {
                    video[0].pause();
                    infobar.css({display: 'block'});
                })
            })
        } else {
            $("body").on('click', video, function () {
                video[0].pause();
                infobar.css({display: 'block'});
                $("body").on('click', video, function () {
                    infobar.css({display: 'none'});
                    video[0].play();
                })
            })
        }
        obj.children('video').on('loadedmetadata', function () {
            $(this).on('mouseover', function () {
                $(".toolBar").stop(1).animate({height: "60px"}, 500);
            });
            var dom = $("<div><div><div><div></div></div>").css({
                height: "20px",
                width: "100%",
                border: "1px solid blue"
            });
            dom.children("div:eq(0)").css({height: "20px", width: "20px", backgroundColor: "red"});
            dom.children("div:eq(1)").css({height: "20px", width: dom.width() - 20, backgroundColor: "green"});
            $(".toolBar").children("div:eq(1)").append(dom);
        });
    }

};