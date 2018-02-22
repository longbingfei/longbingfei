@include('tpl.default.header')
<section>
    <div class="container">
        <div class="row">
            <div class="g-taskposition col-xs-12 col-left">
                您的位置：<a href="/">首页</a> > 发布产品
            </div>
            <form class="productform" id="productForm" action="" method="post">
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
                                <td><input type="text" class="form-control" name="name"></td>
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
                                        <option value="0">--请选择--</option>
                                        @foreach($sorts as $k=>$v)
                                            <option value="{{$k}}">{{$v}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>价格</td>
                                <td><input type="text" class="form-control" name="price"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="cp_tr_s">
                                <td>发布区域</td>
                                <td>
                                    <select class="form-control cityselector" name="area_ids[]" data-id="1">
                                        <option value="">--请选择--</option>
                                        @foreach($provs as $vo)
                                            <option value="{{$vo['id']}}">{{$vo['name']}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control cityselector" name="area_ids[]" data-id="2">
                                        <option value="">--请选择--</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control cityselector" name="area_ids[]" data-id="3">
                                        <option value="">--请选择--</option>
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
                                    style="height:150px;border:1px solid #eaeaea;margin-left: 0px"></dd>
                                <dt>描述:</dt>
                                <dd style="margin-left: 0px">
                                    <script type="text/plain" id="describe"></script>
                                </dd>
                            </dl>
                        </div>

                        <div style="text-align: center">
                            <button type="button" class="btn product_submit_btn"
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
        um = UM.getEditor('describe'),
        content = '{!!  isset($single_data) ? $single_data['content'] : '' !!}';
    um.setContent(content);
</script>
@include('tpl.default.footer')