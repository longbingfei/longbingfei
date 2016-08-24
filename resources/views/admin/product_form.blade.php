@extends('admin.home')
@section('title','product_form')
@section('link')
    @parent
    <link href="{{url('editor/themes/default/css/umeditor.css')}}" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="{{url('editor/third-party/jquery.min.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{url('editor/umeditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{url('editor/umeditor.min.js')}}"></script>
    <script type="text/javascript" src="{{url('editor/lang/zh-cn/zh-cn.js')}}"></script>
@stop
@section('stylesheet')
    @parent
@stop
@section('body')
    @parent
    <h3>商品修改</h3>
    <div class="main_product_form">
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
        <span class="form-span">描述:</span>
        <script type="text/plain" id="describe">
        </script>
        <span class="form-span">图片:</span>
        <div class="show-product-images"></div>
        <input class="pro_describe" type="hidden" name="describe" value="">
        <button class="btn btn-default btn-lg product-submit">保存更改</button>
    </div>
    <script>
        var um = UM.getEditor('describe');
        var content = '{!! isset($single_data) ? $single_data['describe'] : '' !!}';
        um.setContent(content);
        UploadPic.Init($(".show-product-images"));
        $(".main_product_form").on("click", ".product-submit", function () {
            var data = {
                name: $(".pro_name").val(),
                sort_id: $(".pro_sort_id").val(),
                storage: $(".pro_storage").val(),
                price: $(".pro_price").val(),
                describe: um.getContent(),
                _method: "PUT"
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
                        return false;
                    }
                    location.href = "{{url('admin/feature/product')}}";
                }
            });
        });
    </script>
@stop