@extends('admin.home')
@section('title','product_form')
@section('link')
    @parent
    <link href="{{url('editor/themes/default/css/umeditor.css')}}" type="text/css" rel="stylesheet">
    <script type="text/javascript" charset="utf-8" src="{{url('editor/umeditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{url('editor/umeditor.min.js')}}"></script>
    <script type="text/javascript" src="{{url('editor/lang/zh-cn/zh-cn.js')}}"></script>
@stop
@section('stylesheet')
    @parent
@stop
@section('body')
    @parent
    <h3>xxx</h3>
    <div class="main_product_form">
        <div class="product-left">
            <span class="form-span">名称:</span>
            <input type="text" class="pro_name" placeholder="请输入商品名,50字符以内" value="{{isset($single_data) ?
            $single_data['name'] : ''}}">
            <span class="form-span">分类:</span>
            <select class="pro_sort_id">
                @foreach($product_sort as $vo)
                    <option value="{{$vo['id']}}">{{$vo['name']}}</option>
                @endforeach
            </select>
            <span class="form-span">库存:</span>
            <input type="text" class="pro_storage" value="{{isset($single_data) ? $single_data['storage'] : ''}}">
            <span class="form-span">价格:</span>
            <input type="text" class="pro_price" value="{{isset($single_data) ? $single_data['price'] : ''}}">
        </div>
        @if(isset($single_data) && isset($single_data['images']) && ($images = unserialize($single_data['images'])))
        <div class="product-right">
            <div class="product-show-image-detail">
                <img src="{{url($images[0]['path'])}}" title="点击查看原图">
            </div>
            <div class="product-show-image-list">
                @foreach($images as $key => $vo)
                    @if($key < 8)
                    <div class="product-show-image-item">
                        <img src="{{url($vo['path'])}}">
                    </div>
                    @endif
                @endforeach
                <div class="product-add-image-item" title="点击添加">+</div>
            </div>
            <canvas id="product-zoom-image">
                此浏览器不支持画布
            </canvas>
        </div>
        @endif
        <div style="clear:both"></div>
        <span class="form-span">描述:</span>
        <script type="text/plain" id="describe">
        </script>
        <span class="form-span">图片:</span>
        <div class="show-product-images" id="show-product-images"></div>
        <input class="pro_describe" type="hidden" name="describe" value="">
        <button class="btn btn-default btn-lg product-submit">保存更改</button>
    </div>
    <script>
        //初始化编辑器
        var um = UM.getEditor('describe');
        //设置编辑器文本
        var content = '{!! isset($single_data) ? $single_data['describe'] : '' !!}';
        um.setContent(content);
        //加载图片上传模块
        UploadPic.Init($(".show-product-images"));
        //表单提交模块
        $(".main_product_form").on("click", ".product-submit", function () {
            var data = {
                name: $(".pro_name").val(),
                sort_id: $(".pro_sort_id").val(),
                storage: $(".pro_storage").val(),
                price: $(".pro_price").val(),
                describe: um.getContent(),
                _method: '{{isset($single_data) ? "PUT" : "POST"}}'
            };
            var formData = new FormData;
            $.each(data, function (x, y) {
                formData.append(x, y);
            });
            $.each(UploadPic.uploadFiles, function (x, y) {
                formData.append('file[]', y);
            });
            $.ajax({
                url: "{{url('admin/feature/product/'.(isset($single_data) ? $single_data['id'] : ''))}}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (!data.id) {
                        //加载alert框
                        Confirm({title: '错误提示', message: data.error_message});
                        return false;
                    }
                    location.href = "{{url('admin/feature/product')}}";
                }
            });
        });
        //点击跳转原图
        $(".product-show-image-item img").click(function(){
            window.open($(this).attr('src'));
        });
        //图片预览框
        $(".product-show-image-item img").mouseover(function () {
            $(".product-show-image-detail img").attr('src', $(this).attr('src'));
        });
        //点击跳转原图
        $(".product-show-image-detail img").click(function(){
            window.open($(this).attr('src'));
        });
        //移动局部放大
        $(".product-show-image-detail img").mousemove(function (e) {
            var context=document.getElementById("product-zoom-image");
            var ctx=context.getContext("2d");
            var img = new Image();
            img.src = $(this).attr('src');
            img.onload= function() {
                var positionX = $(".product-show-image-detail").offset().left;
                var positionY = $(".product-show-image-detail").offset().top;
                ctx.drawImage(img, e.pageX - positionX, e.pageY - positionY, 400, 300, 0, 0, 400, 300);
                $("#product-zoom-image").show();
            }
        }).mouseout(function () {
            $("#product-zoom-image").hide();
        });
        //图片添加
        $(".product-add-image-item").click(function(){
            location.href="#plug-upload-input";
            $("#plug-upload-input").click();
        });
    </script>
@stop