@include('tpl.default.header')
<section>
    <div class="container">
        <div class="row">
            <div class="g-taskposition col-xs-12 col-left">
                您的位置：<a href="/">首页</a> > 发布产品
            </div>
            <form class="productChangeForm" id="productChangeForm" action="" method="post">
                <div class="col-xs-12">
                    <div class="row ee">
                        <table class="cp_c_table cp_p_table">
                            <tr>
                                <td>公司名称</td>
                                <td style="width: 609px">
                                    <select class="form-control" name="company_id">
                                        @foreach($companys as $v)
                                            <option value="{{$v['id']}}">{{$v['company_name']}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>产品名称</td>
                                <td><input type="text" class="form-control" name="name" value="{{$detail->name}}"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                            <tr class="cp_tr_s1">
                                <td>产品类别</td>
                                <td>
                                    <select class="form-control" name="sort_ids[]">
                                        <option value="0">---请选择--</option>
                                        @foreach($sorts as $key => $vo)
                                            <option value="{{$key}}" {{isset($detail->sort_ids[0]) ? ($key == $detail->sort_ids[0] ? 'selected' : ''):'' }}>{{$vo}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>价格</td>
                                <td><input type="text" class="form-control" name="price" value="{{$detail->price}}"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="cp_tr_s">
                                <td>发布区域</td>
                                <td>
                                    <select class="form-control cityselector" name="area_ids[]" data-id="1" style="border:0px;width:150px;">
                                        <option value="">请选择</option>
                                        @foreach($provs_1 as $vo)
                                            <option value="{{$vo['id']}}" {{isset($detail->up_sort_id[0]) && ($detail->up_sort_id[0] == $vo['id']) ? 'selected' :''}}>{{$vo['name']}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control cityselector" name="area_ids[]" data-id="2" style="border:0px;width:150px;">
                                        <option value="">请选择</option>
                                        @if(!empty($provs_2))
                                            @foreach($provs_2 as $vo)
                                                <option value="{{$vo['id']}}" {{isset($detail->up_sort_id[1]) && ($detail->up_sort_id[1] == $vo['id']) ? 'selected' :''}}>{{$vo['name']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control cityselector" name="area_ids[]" data-id="3" style="border:0px;width:150px;">
                                        <option value="">请选择</option>
                                        @if(!empty($provs_3))
                                            @foreach($provs_3 as $vo)
                                                <option value="{{$vo['id']}}" {{isset($detail->up_sort_id[2]) && ($detail->up_sort_id[2] == $vo['id']) ? 'selected' :''}}>{{$vo['name']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div class="z7">
                            <dl>
                                <dt>产品图片:
                                    <button type="button" id="qiniu">上传图片</button>
                                    <span style="font-size: 13px;">(允许上传三张图片)</span></dt>
                                <dd class="p_img_dd"
                                    style="height:150px;border:1px solid #eaeaea;margin-left: 0px">
                                    @foreach($detail->images as $vo)
                                    <div class="dd_wrap_div">
                                        <span class="glyphicon glyphicon-remove-circle dd_img_delete"></span>
                                        <img src="{{$vo}}">
                                        <input type="hidden" name="images[]" value="{{$vo}}">
                                    </div>
                                    @endforeach
                                </dd>
                                <dt>描述:</dt>
                                <dd style="margin-left: 0px">
                                    <script type="text/plain" id="describe"></script>
                                </dd>
                            </dl>
                        </div>

                        <div style="text-align: center">
                            <button type="button" class="btn product_update_btn"
                                    style="width:100px;background-color: #438eb9;margin:-10px auto 10px auto">提 交
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<iframe id="id_iframe" name="nm_iframe" style="display:none;"></iframe>
<script type="text/javascript" charset="utf-8" src="{{url('editor/umeditor.config.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{url('editor/umeditor.min.js')}}"></script>
<script type="text/javascript" src="{{url('editor/lang/zh-cn/zh-cn.js')}}"></script>
<script>
    var user_id = '{{session("id")}}',
        qiniu_access_token = '{{$qiniu_access_token}}',
        qiniu_img_domain = '{{$qiniu_img_domain}}',
        tmp_img_data = null,
        pid = '{{$detail->id}}'|0,
        um = UM.getEditor('describe'),
        content = '{!!  $detail->describe ?: '' !!}';
    um.setContent(content);
</script>
@include('tpl.default.footer')