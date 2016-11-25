/**
 * Created by zhangxian on 16/9/6.
 */
$(function () {
    //加载提示框
    $('[data-toggle="popover"]').popover({html: true});

    //鼠标悬停时内容左补白10px
    //.padding_move
    $("body").on('mouseover mouseout', '.padding_move', function (e) {
        if (e.type == "mouseover") {
            $(this).stop(0).animate({paddingLeft: "10px"}, 300);
        } else if (e.type == "mouseout") {
            $(this).stop(0).animate({paddingLeft: "0px"}, 300);
        }
    });
});
