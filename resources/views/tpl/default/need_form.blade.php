@include('tpl.default.header')
<section>
    <div class="container">
        <div class="row">
            <div class="g-taskposition col-xs-12 col-left">
                您的位置：<a href="/">首页</a> > 发布需求
            </div>
            <form class="needform" id="needForm" action="/need_create" method="post">
                <div class="col-xs-12">
                    <div class="row ee">
                        <div class="">
                            <div class="g-taskclassify clearfix  table-responsive">
                                <div class="col-xs-12 clearfix task-type" style="margin-left: -22px;font-size: 15px;">
                                    <table>
                                        <tr class="cp_tr_s1">
                                            <td>需求类别</td>
                                            <td>
                                                <select class="form-control" name="sort_id" style="border:0px;width:150px;">
                                                    <option value="0">请选择</option>
                                                    @foreach($sorts as $k=>$v)
                                                        <option value="{{$k}}">{{$v}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="cp_tr_s">
                                            <td>发布区域</td>
                                            <td>
                                                <select class="form-control cityselector" name="area_id[]" data-id="1" style="border:0px;width:150px;">
                                                    <option value="">请选择</option>
                                                    @foreach($provs as $vo)
                                                        <option value="{{$vo['id']}}">{{$vo['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control cityselector" name="area_id[]" data-id="2" style="border:0px;width:150px;">
                                                    <option value="">请选择</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control cityselector" name="area_id[]" data-id="3" style="border:0px;width:150px;">
                                                    <option value="">请选择</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt10">
                            <div class="input-group">
                                <span class="input-group-addon">需求标题</span>
                                <input type="text" class="form-control" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">公司名称</span>
                                <input type="text" class="form-control" name="company_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">联系电话</span>
                                <input type="text" class="form-control" name="tel">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">周期</span>
                                <input type="text" class="form-control" name="period">
                                <span class="input-group-addon">QQ</span>
                                <input type="text" class="form-control" name="qq">
                                <span class="input-group-addon">预算</span>
                                <input type="text" class="form-control" name="budget">
                            </div>
                        </div>

                        <div class="z7">
                            <dl>
                                <dt>产品图片:
                                    <button type="button" id="qiniu">上传图片</button>
                                    <span style="font-size: 13px;">(允许上传三张图片)</span></dt>
                                <dd class="p_img_dd" style="height:150px;border:1px solid #eaeaea;margin-left: 0px"></dd>
                                <dt>描述:</dt>
                                <dd style="margin-left: 0px">
                                    <textarea name="describe" style="border:1px solid #eaeaea;resize:none"
                                              class="form-control" rows="6"></textarea>
                                </dd>
                                <dt>备注:</dt>
                                <dd style="margin-left: 0px">
                                    <textarea name="mark" style="border:1px solid #eaeaea;resize:none"
                                              class="form-control" rows="6"></textarea>
                                </dd>
                            </dl>
                        </div>
                        <div style="text-align: center">
                            <button type="button" class="btn need_submit_btn"
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
<script>
    var user_id = '{{session("id")}}',
        qiniu_access_token = '{{$qiniu_access_token}}',
        qiniu_img_domain = '{{$qiniu_img_domain}}',
        tmp_img_data = null;
</script>
@include('tpl.default.footer')