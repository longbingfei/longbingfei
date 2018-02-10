var taskMark;
$(function () {
    $('.js1 > .z9').css('width', function () {
        return ($(this).parent().width() - 25) / 4 + 'px';
    });

    //图片上传七牛云
    $('#qiniu').click(function () {
        clearInterval(taskMark);
        if ($('.p_img_dd').find('.dd_wrap_div').length >= 3) {
            return $.Confirm({message: '最多上传三张图片！'});
        }
        $('body').find('.qiniuform').remove();
        var _symbol = (new Date).getTime() + '_' + user_id;
        $('body').append($('<form class="qiniuform" style="display:none" method="post" action="http://up-z2.qiniu.com" enctype="multipart/form-data" target="nm_iframe">' +
            '  <input name="token" type="hidden" value="' + qiniu_access_token + '">' +
            ' <input name="x:symbol" type="hidden" value="' + _symbol + '">' +
            '  <input name="file" type="file"/>' +
            '</form>')).on('change', '.qiniuform > input[name=file]', function () {
            $('.qiniuform').submit();
            checkUploadStatus(_symbol, function () {
                tmp_img_data && $('.p_img_dd').append($('<div class="dd_wrap_div"><span class="glyphicon glyphicon-remove-circle dd_img_delete"></span><img src="' + qiniu_img_domain + tmp_img_data.key + '"><input type="hidden" name="images[]" value="' + qiniu_img_domain + tmp_img_data.key + '"></div>'));
                tmp_img_data = null;
            });
        }).on('click', '.dd_img_delete', function () {
            $(this).parent().remove();
        });
        $('.qiniuform > input[name=file]').off().click();
    });

    //创建需求
    $('.need_submit_btn').click(function () {
        $.ajax({
            url: '/create_need',
            type: 'post',
            data: $('#needForm').serialize(),
            success: function (data) {
                data = JSON.parse(data);
                if (!data || data.code !== 0) {
                    return $.Confirm({message: '需求创建失败，请稍后再试!'});
                }
                location.href = '/need/' + data.data.id;
            }
        });
    });

    //企业头背景
    $('body').on('click', '.cp_h_img >span', function () {
        clearInterval(taskMark);
        $('body').find('.cp_h_img_form').remove();
        var _symbol = (new Date).getTime() + '_' + user_id;
        $('body').append($('<form class="cp_h_img_form" style="display:none" method="post" action="http://up-z2.qiniu.com" enctype="multipart/form-data" target="nm_iframe">' +
            '  <input name="token" type="hidden" value="' + qiniu_access_token + '">' +
            ' <input name="x:symbol" type="hidden" value="' + _symbol + '">' +
            '  <input name="file" type="file"/>' +
            '</form>')).on('change', '.cp_h_img_form > input[name=file]', function () {
            $('.cp_h_img_form').submit();
            checkUploadStatus(_symbol, function () {
                tmp_img_data && $('.cp_h_img').html('').append($('<div class="dd_wrap_div" style="height:240px;"><span class="glyphicon glyphicon-remove-circle dd_img_delete"></span><img src="' + qiniu_img_domain + tmp_img_data.key + '" style="height:240px"><input type="hidden" name="image" value="' + qiniu_img_domain + tmp_img_data.key + '"></div>'));
                tmp_img_data = null;
            });
        }).on('click', '.dd_img_delete', function () {
            $(this).parent().parent().html('').append('<span class="glyphicon glyphicon-plus"> 添加企业背景图片</span>');
        });
        $('.cp_h_img_form > input[name=file]').off().click();
    });

    //企业logo
    $('body').on('click', '#cp_logo_add i', function () {
        clearInterval(taskMark);
        $('body').find('.cp_logo_img_form').remove();
        var _symbol = (new Date).getTime() + '_' + user_id;
        $('body').append($('<form class="cp_logo_img_form" style="display:none" method="post" action="http://up-z2.qiniu.com" enctype="multipart/form-data" target="nm_iframe">' +
            '  <input name="token" type="hidden" value="' + qiniu_access_token + '">' +
            ' <input name="x:symbol" type="hidden" value="' + _symbol + '">' +
            '  <input name="file" type="file"/>' +
            '</form>')).on('change', '.cp_logo_img_form > input[name=file]', function () {
            $('.cp_logo_img_form').submit();
            checkUploadStatus(_symbol, function () {
                tmp_img_data && $('#cp_logo_add').html('').append($('<div class="dd_wrap_div" style="width:50px;height:50px;"><span class="glyphicon glyphicon-remove-circle dd_img_delete"></span><img src="' + qiniu_img_domain + tmp_img_data.key + '" style="width:50px;height:50px;"><input type="hidden" name="logo" value="' + qiniu_img_domain + tmp_img_data.key + '"></div>'));
                tmp_img_data = null;
            });
        }).on('click', '.dd_img_delete', function () {
            $(this).parent().parent().html('').append('<i class="glyphicon glyphicon-plus"></i>');
        });
        $('.cp_logo_img_form > input[name=file]').off().click();
    });

    //企业入驻
    $('.company_submit_btn').click(function () {
        $.ajax({
            url: '/establish',
            type: 'post',
            data: $('#companyForm').serialize(),
            success: function (data) {
                data = JSON.parse(data);
                if (!data || data.code !== 0) {
                    return $.Confirm({message: '企业入驻失败，请稍后再试!'});
                }
                location.href = '/company/' + data.data.id;
            }
        });
    });

});

//图片上传查询
function checkUploadStatus(symbol, callback) {
    clearInterval(taskMark);
    $.Confirm({message: '图片上传中...', hideToolBar: true});
    var st = (new Date).getTime();
    taskMark = setInterval(function () {
        if ((new Date).getTime() - st > 20000) {
            clearInterval(taskMark);
            return $.Confirm({message: '图片上传失败，请稍后再试!'});
        }
        $.getJSON('/task?t=' + (new Date).getTime() + '&symbol=' + symbol, function (data) {
            if (data && data.code === 0) {
                tmp_img_data = data.data;
                clearInterval(taskMark);
                return $.Confirm({message: '图片上传成功!', callback: callback});
            }
        });
    }, 2000);
}

(function ($) {
    $.extend({
        Carousel: {
            host: null,
            init: function (obj) {
                var max = 8;
                var images = obj.images;
                var payload = obj.payload;
                var time = obj.time ? obj.time : 3000;
                if (!images || !images.length || !payload) {
                    return false;
                }
                if (obj.host) {
                    this.host = obj.host;
                }
                images = JSON.parse(images);
                var carouselDiv = $("<div><div></div></div>").css({
                    position: 'relative',
                    width: payload.width() > 320 ? payload.width() : 320,
                    height: payload.height() > 240 ? payload.height() : 240
                }).addClass("carousel_s");
                $(carouselDiv.children()[0]).css({
                    width: carouselDiv.width(),
                    height: '60px',
                    position: 'absolute',
                    bottom: '0',
                    zIndex: 9,
                    cursor: 'pointer',
                    boxShadow: '0px 0px 1px 1px cadetblue inset',
                    borderRadius: '5px',
                    backgroundColor: 'rgba(0,0,0,0.8)'
                });
                var carouselListDiv = $("<div></div>").css({
                    width: '40px',
                    height: '40px',
                    margin: '10px 0px 10px 10px',
                    zIndex: 9,
                    cursor: 'pointer',
                    boxShadow: '0px 0px 1px 1px cadetblue inset',
                    borderRadius: '5px'
                }).addClass("carousel_s-list");
                var that = this;
                $.each(images, function (x, y) {
                    if (x < max) {
                        var item = carouselListDiv.clone().css({
                            float: 'left',
                            backgroundImage: 'url(' + that.host + y.thumb + ')'
                        }).data({src: that.host + y.path, id: x});
                        $(carouselDiv.children()[0]).append(item);
                    }
                });
                var img = $("<img>").css({
                    width: carouselDiv.width(),
                    height: carouselDiv.height()
                });
                img.attr('src', this.host + images[0].path).data('id', 0);
                img.appendTo(carouselDiv);
                payload.append(carouselDiv);
                $(".carousel_s-list").mouseover(function () {
                    img.attr('src', $(this).data('src')).data('id', $(this).data('id'));
                });
                setInterval(function () {
                    $.Carousel.action(images);
                }, time);
            },
            action: function (images) {
                var img_ = $(".carousel_s").children("img")[0];
                var id = $(img_).data('id');
                id = id < images.length - 1 ? id + 1 : 0;
                $(img_).attr('src', this.host + images[id].path).data('id', id);
            }
        }
    });
})($);

;(function ($) {
    $.extend({
        Confirm: function (msg) {
            $("body").find(".msg_modal").remove();
            if (!msg || !msg.message) {
                return false;
            }
            var coverDiv = $("<div></div>").css({
                width: "100%",
                height: "100%",
                position: "absolute",
                top: 0,
                left: 0,
                backgroundColor: "black",
                opacity: "0.6",
                zIndex: 9998
            }).addClass("msg_modal");
            var confirmDiv = $("<div></div>").css({
                width: "400px",
                height: "200px",
                backgroundColor: "white",
                boxShadow: "0px 0px 15px 5px rgb(45, 59, 67)",
                position: 'fixed',
                top: 0,
                left: 0,
                right: 0,
                bottom: 0,
                margin: 'auto',
                textAlign: "center",
                zIndex: 9999,
                color: "black"
            }).addClass("msg_modal");
            var confirmBody = "<h4 style='margin: 0 0;height: 40px;line-height: 40px;'><span class='glyphicon glyphicon-exclamation-sign' style='color:indianred'></span>&nbsp&nbsp" +
                (msg && msg.title ? msg.title : '提示') + "</h4><hr style='margin:4px 4px !important;'/>" +
                "<div style='width:300px;height:100px;margin:0 auto;line-height:100px;font-size: 16px;'>" + msg.message + "</div>";
            confirmBody += msg.hideToolBar ? '' : "<hr style='margin:4px 4px !important;' />" +
                "<div style='height: 40px;line-height: 35px;'><botton class='btn btn-default btn-cancel' style='margin-right: 60px;height:40px'>取消</botton>" +
                "<botton class='btn btn-default btn-small btn-ok' style='height:40px'>确定</botton></div>";
            $("body").append(coverDiv).append(confirmDiv.append(confirmBody));
            $(".msg_modal").on('click', '.btn', function () {
                if ($(this).hasClass('btn-cancel')) {
                    $("body").find(".msg_modal").remove();
                } else if ($(this).hasClass('btn-ok')) {
                    $("body").find(".msg_modal").remove();
                    (typeof msg.callback == 'function') ? msg.callback() : '';
                }
                return false;
            });

            return false;
        }
    });
})($);

//省市区
$('.cityselector').change(function () {
    var pid = $(this).val(),
        level = $(this).data('id'),
        _next = $('.cityselector');
    _next.each(function (x, y) {
        $(y).data('id') > level && $(y).html("<option>--请选择--</option>");
        if (pid && ($(y).data('id') === level + 1)) {
            $.getJSON('/city/' + pid, function (data) {
                if (data && data.length) {
                    var html = "<option>--请选择--</option>";
                    $(data).each(function (a, b) {
                        html += "<option value='" + b.id + "'>" + b.name + "</option>";
                    });
                    $(y).html(html);
                }
            });
        }
    });
});

