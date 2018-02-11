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
                        <h1>{{$data->title}}
                            {{--@if(!in_array($data->id, session('join_need_ids')))--}}
                            {{--<small class="join">我要报名</small>--}}
                            {{--@else--}}
                            <small class="has-join">已报名</small>
                            {{--@endif--}}
                        </h1>
                    </div>
                    <table class="ztb">
                        <tr>
                            <td>公司名称:</td>
                            <td>{{$data->company_name}}</td>
                            <td>预算金额:</td>
                            <td>{{$data->budget}}</td>
                            <td>周期:</td>
                            <td>{{$data->period}}</td>
                        </tr>
                        <tr>
                            <td>联系电话:</td>
                            <td>{{$data->tel}}</td>
                            <td>QQ:</td>
                            <td>{{$data->qq}}</td>
                            <td>微信:</td>
                            <td>{{$data->wechat}}</td>
                        </tr>
                        <tr>
                            <td>报名人数:</td>
                            <td></td>
                            <td>发布时间:</td>
                            <td>{{Date('Y-m-d',strtotime($data->created_at))}}</td>
                            <td>状态:</td>
                            <td>{{$data->status}}</td>
                        </tr>
                    </table>
                    <div class="z7">
                        <h2>项目描述</h2>
                        <dl>
                            <dt>产品图片:</dt>
                            <dd>
                                @if($data->images)
                                    @foreach($data->images as $vo)
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
                                {{$data->describe}}
                            </dd>
                            <dt>备注:</dt>
                            <dd>
                                {{$data->mark}}
                            </dd>
                        </dl>
                    </div>
                    <div class="z8 z9_">
                        <h2>报名企业</h2>
                        @if(!collect($data->companys)->toArray()['total'])
                            <div style="height:50px;padding-left: 10px;line-height: 50px;">
                                暂无相关数据
                            </div>
                        @else
                            <ul class="g-taskmainlist">
                                @foreach($data->companys as $vo)
                                    <li class="clearfix zz1">
                                        <div class="row zz zzz">
                                            <div class="col-lg-6 col-sm-8">
                                                <div class="logo">
                                                    <img src="{{$vo->logo?:'/asset/web/image/kabuki.jpg'}}">
                                                </div>
                                                <div class="name">{{$vo->company_name}}</div>
                                            </div>
                                            <div class="col-lg-3 col-sm-8">
                                                <div class="info">
                                                    <span>电话: {{$vo->tel}}</span>
                                                    <span>Q Q: {{$vo->qq}}</span>
                                                    <span class="ecli">地址: {{$vo->address}}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-4">
                                                <div class="z5 kk">
                                                    <a href="/company/{{$vo->id}}">公司详情</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            {!! $data->companys->render() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('tpl.default.footer')