$(function () {
    $('.js1 > .z9').css('width', function () {
        return ($(this).parent().width() - 25) / 4 + 'px';
    });
});

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

