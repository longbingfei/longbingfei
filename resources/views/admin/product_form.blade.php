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
    <h3>xxxx</h3>
    <div class="main_product_form">
        <form action="{{url('admin/feature/product/'.(isset($single_data) ? $single_data['id'] : ''))}}" method="POST">
            <span class="form-span">名称:</span>
            <input type="text" name="name" placeholder="请输入商品名,50字符以内" value="{{isset($single_data) ? $single_data['name'] : ''}}">
            <span class="form-span">分类:</span>
            <select  name="sort_id">
                @foreach($product_sort as $vo)
                    <option value="{{$vo['id']}}">{{$vo['name']}}</option>
                @endforeach
            </select>
            <span class="form-span">库存:</span>
            <input type="text" name="storage"  value="{{isset($single_data) ? $single_data['storage'] : ''}}">
            <span class="form-span">价格:</span>
            <input type="text" name="price"  value="{{isset($single_data) ? $single_data['price'] : ''}}">
            <span class="form-span">描述:</span>
            <script type="text/plain" id="describe">
            </script>
            <span class="form-span">图片:</span>
            <div class="show-product-images"></div>
            @if(isset($single_data))
                <input type="hidden" name="_method" value="PUT">
            @endif
            <input class="describe" type="hidden" name="describe" value="">
            <button class="btn btn-default btn-lg product-submit" type="submit">保存更改</button>
        </form>
    </div>
    <script>
        var um = UM.getEditor('describe');
        um.addListener('blur',function(){
            var val = um.getContent();
            $('.describe').val(val)
        });
        $("#describe").html("{{isset($single_data) ? $single_data['describe'] : ''}}");
        UploadPic.Init($(".show-product-images"));
    </script>
@stop