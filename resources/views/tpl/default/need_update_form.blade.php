@include('tpl.default.header')
<section>
    <div class="container">
        <div class="row">
            <div class="g-taskposition col-xs-12 col-left">
                您的位置：<a href="/">首页</a> > 需求修改
            </div>
            <form class="needform" id="needChangeForm" method="post">
                <div class="col-xs-12">
                    <div class="row ee">
                        <div class="">
                            <div class="col-xs-12 clearfix task-type" style="font-size: 15px;">
                                <table>
                                    <tr class="cp_tr_s1">
                                        <td>需求类别</td>
                                        <td>
                                            <select class="form-control" name="sort_id" style="border:0px;width:150px;">
                                                <option value="0">请选择</option>
                                                @foreach($sorts as $k=>$v)
                                                    <option value="{{$k}}" {{$detail->sort_id == $k ? 'selected' : ''}}>{{$v}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="cp_tr_s">
                                        <td>发布区域</td>
                                        <td>
                                            <select class="form-control cityselector" name="area_id[]" data-id="1" style="border:0px;width:150px;">
                                                <option value="">请选择</option>
                                                @foreach($provs_1 as $vo)
                                                    <option value="{{$vo['id']}}" {{isset($detail->up_sort_id[0]) && ($detail->up_sort_id[0] == $vo['id']) ? 'selected' :''}}>{{$vo['name']}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control cityselector" name="area_id[]" data-id="2" style="border:0px;width:150px;">
                                                <option value="">请选择</option>
                                                @if(!empty($provs_2))
                                                    @foreach($provs_2 as $vo)
                                                        <option value="{{$vo['id']}}" {{isset($detail->up_sort_id[1]) && ($detail->up_sort_id[1] == $vo['id']) ? 'selected' :''}}>{{$vo['name']}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control cityselector" name="area_id[]" data-id="3" style="border:0px;width:150px;">
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
                            </div>
                        </div>
                        </div>
                        <div class="form-group mt10">
                            <div class="input-group">
                                <span class="input-group-addon">需求标题</span>
                                <input type="text" class="form-control" name="title" value="{{$detail->title}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">公司名称</span>
                                <input type="text" class="form-control" name="company_name"
                                       value="{{$detail->company_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">联系电话</span>
                                <input type="text" class="form-control" name="tel" value="{{$detail->tel}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">周期</span>
                                <input type="text" class="form-control" name="period" value="{{$detail->period}}">
                                <span class="input-group-addon">预算</span>
                                <input type="text" class="form-control" name="budget" value="{{$detail->budget}}">
                                <span class="input-group-addon">QQ</span>
                                <input type="text" class="form-control" name="qq" value="{{$detail->qq}}">
                            </div>
                        </div>

                        <div class="z7">
                            <dl>
                                <dt>产品图片:
                                    <button type="button" id="qiniu">上传图片</button>
                                    <span style="font-size: 13px;">(允许上传三张图片)</span></dt>
                                <dd class="p_img_dd" style="height:150px;border:1px solid #eaeaea;margin-left: 0px">
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
                                    <textarea name="describe" style="border:1px solid #eaeaea;resize:none"
                                              class="form-control" rows="6">{{$detail->describe}}</textarea>
                                </dd>
                                <dt>备注:</dt>
                                <dd style="margin-left: 0px">
                                    <textarea name="mark" style="border:1px solid #eaeaea;resize:none"
                                              class="form-control" rows="6">{{$detail->mark}}</textarea>
                                </dd>
                            </dl>
                        </div>
                        <div style="text-align: center">
                            <button type="button" class="btn need_change_submit_btn"
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
        tmp_img_data = null,
        nid = '{{$detail->id}}' | 0
</script>
@include('tpl.default.footer')