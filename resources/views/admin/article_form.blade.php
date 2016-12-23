@extends('admin.home')
@section('title',isset($single_data) ? '更新文稿' : '新增文稿')
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
@section('nav')
    @parent
@stop
@section('subject',isset($single_data) ? '更新文稿' : '新增文稿')
@section('body')
    @parent
    <div class="main_article_form">
        <div class="art_top_div">
            <span class="form-span">文稿标题:</span>
            <input type="text" class="art_title"
                   placeholder="请输入文稿标题,50字以内"
                   value="{{isset($single_data) ? $single_data['title'] : ''}}">
            <span class="form-span">文稿分类:</span>
            <input type="text" class="art_sort"
                   _sort_id="{{isset($single_data) ?$single_data['sort_id'] : ''}}"
                   value="{{isset($single_data) ? $single_data['sort_name'] :''}}"
                   placeholder="点击选择文稿分类"
            >
            <span class="form-span">索引图(选填):</span>
            <div class="index_pic_div"></div>
        </div>
        <div style="clear:both"></div>
        <span class="form-span">文稿内容:</span>
        <script type="text/plain" id="describe">
        </script>
        <button class="btn btn-submit">保存</button>
    </div>
    <script>
        //初始化分类选择框
        SortList.init({dom: $(".art_sort"), url: "{{url('admin/feature/article_sort')}}"});
        //初始化索引图上传控件
        $.UploadImage.Init({
            dom: $('.index_pic_div'),
            max: 1,
            bgsrc: "{{isset($single_data) ? (empty($single_data['index_pic']) ? '' : url($single_data['index_pic']['path'])) :''}}"
        });
        var um = UM.getEditor('describe');
        //设置编辑器文本
        var content = '{!!  isset($single_data) ? $single_data['content'] : '' !!}';
        um.setContent(content);
        $(".main_article_form").on("click", ".btn-submit", function () {
            var data = {
                title: $(".art_title").val(),
                sort_id: $(".art_sort").attr('_sort_id'),
                content: um.getContent(),
                _method: '{{isset($single_data) ? "PUT" : "POST"}}'
            };
            var formData = new FormData;
            $.each(data, function (x, y) {
                formData.append(x, y);
            });
            if (Object.keys($.UploadImage.uploadFiles).length == 1) {
                $.each($.UploadImage.uploadFiles, function (x, y) {
                    formData.append('file', y);
                });
            }
            $.ajax({
                url: "{{url('admin/feature/article/'.(isset($single_data) ? $single_data['id'] : ''))}}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (!data.id) {
                        $.Confirm({title: '错误提示', message: data.error_message});
                        return false;
                    }
                    location.href = "{{url('admin/feature/article')}}";
                }
            });
        });
    </script>
@stop