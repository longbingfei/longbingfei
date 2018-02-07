@include('tpl.default.header')
<section>
    <div class="container">
        <div class="row">
            <div class="g-taskposition col-xs-12 col-left">
                您的位置：<a href="/">首页</a> > 需求详情
            </div>

            <div class="col-xs-12">
                <div class="row ee">
                    <div class="status_img">
                        <h2>需求状态</h2>
                        <img src="/asset/web/image/flow_1.jpg">
                    </div>
                    <div>
                        <h1>{{$data['title']}}
                            <small class="join">我要报名</small>
                        </h1>
                    </div>
                    <table class="ztb">
                        <tr>
                            <td>公司名称:</td>
                            <td>{{$data['company_name']}}</td>
                            <td>预算金额:</td>
                            <td>{{$data['budget']}}</td>
                            <td>周期:</td>
                            <td>{{$data['period']}}</td>
                        </tr>
                        <tr>
                            <td>联系电话:</td>
                            <td>{{$data['tel']}}</td>
                            <td>QQ:</td>
                            <td>{{$data['qq']}}</td>
                            <td>微信:</td>
                            <td>{{$data['wechat']}}</td>
                        </tr>
                        <tr>
                            <td>报名人数:</td>
                            <td></td>
                            <td>发布时间:</td>
                            <td>{{$data['created_at']}}</td>
                            <td>状态:</td>
                            <td>{{$data['status']}}</td>
                        </tr>
                    </table>
                    <div class="z7">
                        <h2>项目描述</h2>
                        <dl>
                            <dt>产品图片:</dt>
                            <dd>
                                @if($data['images'])
                                    @foreach( $data['images'] as $vo)
                                        <img src="{{$vo}}">
                                    @endforeach
                                @else
                                    <img src="/asset/web/image/need_default1.jpg">
                                    <img src="/asset/web/image/need_default2.jpg">
                                    <img src="/asset/web/image/need_default3.jpg">
                                @endif
                            </dd>
                            <dt>描述:</dt>
                            <dd>
                                {{$data['describe']}}
                            </dd>
                            <dt>备注:</dt>
                            <dd>
                                {{$data['mark']}}
                            </dd>
                        </dl>
                    </div>
                    <div class="z8 z9_">
                        <h2>报名企业</h2>
                        <ul class="g-taskmainlist">
                            <li class="clearfix zz1">
                                <div class="row zz zzz">
                                    <div class="col-lg-6 col-sm-8">
                                        <div class="logo">
                                            <img src="http://bjmhasset.b0.upaiyun.com/assets/level3/layout/portal/home-3002c8dd8255b9d37e79af8a486b0a2c.gif">
                                        </div>
                                        <div class="name">啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊ddddddddddddddd</div>
                                    </div>
                                    <div class="col-lg-3 col-sm-8">
                                        <div class="info">
                                            <span>电话: 15111515151</span>
                                            <span>Q Q: 58988955</span>
                                            <span class="ecli">地址: 水水水水水水水水水水水水水水水水水水水</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4">
                                        <div class="z5 kk">
                                            <a href="/company/1">公司详情</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix zz1">
                                <div class="row zz zzz">
                                    <div class="col-lg-6 col-sm-8">
                                        <div class="logo">
                                            <img src="http://bjmhasset.b0.upaiyun.com/assets/level3/layout/portal/home-3002c8dd8255b9d37e79af8a486b0a2c.gif">
                                        </div>
                                        <div class="name">啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊ddddddddddddddd</div>
                                    </div>
                                    <div class="col-lg-3 col-sm-8">
                                        <div class="info">
                                            <span>电话: 15111515151</span>
                                            <span>Q Q: 58988955</span>
                                            <span class="ecli">地址: 水水水水水水水水水水水水水水水水水水水</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4">
                                        <div class="z5 kk">
                                            <a href="/company/1">公司详情</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix zz1">
                                <div class="row zz zzz">
                                    <div class="col-lg-6 col-sm-8">
                                        <div class="logo">
                                            <img src="http://bjmhasset.b0.upaiyun.com/assets/level3/layout/portal/home-3002c8dd8255b9d37e79af8a486b0a2c.gif">
                                        </div>
                                        <div class="name">啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊ddddddddddddddd</div>
                                    </div>
                                    <div class="col-lg-3 col-sm-8">
                                        <div class="info">
                                            <span>电话: 15111515151</span>
                                            <span>Q Q: 58988955</span>
                                            <span class="ecli">地址: 水水水水水水水水水水水水水水水水水水水</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4">
                                        <div class="z5 kk">
                                            <a href="/company/1">公司详情</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@include('tpl.default.footer')