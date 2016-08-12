@extends('admin.home')
@section('title','product')
@section('link')
    @parent
    @stop
@section('stylesheet')
    @parent
        .panel{
            /*box-shadow: 0 0 6px #0D3349;*/
        }
        .product-main{
            overflow: hidden;
            width:100%;
            box-shadow: 0 0 6px #0D3349;
        }
        .product-table tr td{
            vertical-align: middle !important;
        }
        .product-table tr:first-child td{
            font-size: 16px;
            font-weight: 400;
        }
        td img{
            width:80px;
            height:60px;
        }
    @stop
@section('body')
    @parent
<div class="container">
    <div class="panel panel-default">
        <a class="btn btn-primary new-product-a">新建</a>
    </div>
    <div class="product-main">
        <table class="table table-hover product-table">
            <tr class="active">
                <td>选择</td>
                <td>展示</td>
                <td>名称</td>
                <td>分类</td>
                <td>创建时间</td>
                <td>更新时间</td>
                <td>操作人</td>
                <td>操作</td>
            </tr>
            @if(empty($data))
                <tr>
                    <td>无相关数据</td>
                </tr>
            @else
                @foreach($data['data'] as $item => $value)
                <tr>
                    <td><input type="checkbox"></td>
                    <td><img src="{{empty($value['images']) ? '' : url($value['images'][0]['path'])}}"></td>
                    <td>{{$value['name']}}</td>
                    <td>{{$value['sort_name']}}</td>
                    <td>{{$value['created_at']}}</td>
                    <td>{{$value['updated_at']}}</td>
                    <td>{{$value['username']}}</td>
                    <td>xxx</td>
                </tr>
                @endforeach
            @endif
        </table>
    </div>
    @if(!empty($data))
    <div class="painate" style="float:right;margin-top: 2px">
        <ul id="pagination-digg">
            @for($i = 1;$i<=$data['last_page'];$i++)
                <li><a href="?page={{$i}}">{{$i}}</a></li>
            @endfor
            <li class="next"><a href="javascript:void(0)">共{{$data['last_page']}}页/计{{$data['total']}}条</a></li>
        </ul>
    </div>
    @endif
</div>
@stop
{{--modal--}}
{{--<div class="container">--}}
    {{--<div class="modal fade modal-product" tabindex="-1" role="dialog">--}}
        {{--<div class="modal-dialog modal-lg">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close product-cancel" data-dismiss="modal" aria-label="Close"><span--}}
                                {{--aria-hidden="true">&times;</span></button>--}}
                    {{--<h4 class="modal-title" id="myModalLabel">添加</h4>--}}
                {{--</div>--}}
                {{--<form id="product-form" action="#">--}}
                    {{--<div class="modal-body">--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="product-sort" class="control-label">分类</label>--}}
                            {{--<select class="form-control" id="product-sort">--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="product-name" class="control-label">名称:</label>--}}
                            {{--<input type="text" class="form-control" id="product-name">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="product-describe" class="control-label">描述:</label>--}}
                            {{--<input type="text" class="form-control" id="product-describe">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="product-price" class="control-label">几何:</label>--}}
                            {{--<input type="text" class="form-control" id="product-price">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="product-storage" class="control-label">库存:</label>--}}
                            {{--<input type="text" class="form-control" id="product-storage">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label >图片:</label>--}}
                            {{--<div class="image-upload-div"></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<button type="button" class="btn btn-default product-cancel" data-dismiss="modal">取消</button>--}}
                        {{--<button type="button" class="btn btn-primary submit">添加</button>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<script>--}}
{{--//    用Object.keys(obj).length--}}
{{--//    splice(index,length,var)--}}
{{--//    delete obj.value--}}
    {{--$("body").on("click",".new-product-a",function(){--}}
        {{--$.getJSON("{{'feature/product_sort'}}",function(sort){--}}
            {{--var select = $("#product-sort");--}}
                {{--select.empty();--}}
            {{--$.each(sort,function(k,v){--}}
                {{--var option = $("<option>"+ v.name +"</option>").val(v.id);--}}
                {{--select.append(option);--}}
            {{--});--}}
        {{--});--}}
        {{--$(".modal-product").modal();--}}
        {{--UploadPic.Init($(".image-upload-div"));--}}
        {{--$(".submit").on('click',function(){--}}
            {{--var images = UploadPic.Send('商品图片',3);--}}
            {{--if(images.length){--}}
                {{--var form = new FormData;--}}
                {{--var productSort = $.trim($("#product-sort").val());--}}
                {{--var productName = $.trim($("#product-name").val());--}}
                {{--var productDescribe = $.trim($("#product-describe").val());--}}
                {{--var productPrice = $("#product-price").val();--}}
                {{--var productStorage = $("#product-storage").val();--}}
                {{--form.append('sort_id',productSort);--}}
                {{--form.append('name',productName);--}}
                {{--form.append('describe',productDescribe);--}}
                {{--form.append('price',productPrice);--}}
                {{--form.append('storage',productStorage);--}}
                {{--form.append('images',JSON.stringify(images));--}}
                {{--$.ajax({--}}
                    {{--method:'POST',--}}
                    {{--url:"{{'feature/product'}}",--}}
                    {{--data:form,--}}
                    {{--processData:false,--}}
                    {{--contentType:false,--}}
                    {{--success:function(data){--}}
                        {{--if(data == 1){--}}
                            {{--location.reload();--}}
                        {{--}--}}
                    {{--}--}}
                {{--});--}}
            {{--}--}}
        {{--});--}}
        {{--$(".product-cancel").on('click',function(){--}}
            {{--UploadPic.Reset();--}}
            {{--$("#product-form")[0].reset();--}}
        {{--})--}}
    {{--})--}}
{{--</script>--}}