@include('tpl.default.header')
<link rel="stylesheet" href="/asset/web/css/blue/user.css">
<link media="all" type="text/css" rel="stylesheet" href="/asset/web/css/usercenter/usercenter.css">
<section>
    <div class="container">
        <div class="row" style="margin-bottom: 20px">
            <div class="g-taskposition col-lg-12 col-left">您的位置：<a href="/">首页</a> > 个人中心</div>
            <div class="col-lg-3 col-left">
                <div class="focuside clearfix nodel" style="border: 1px solid #eee">
                    <div class="text-center col-md-4 col-sm-6 col-lg-12">
                        <div class="s-usercenterimg focusideimg profile-picture col-sm-6 col-lg-12">
                            <img id="avatar" class='user-image editable img-responsive'
                                 src="/asset/web/images/default_avatar.png "/>
                        </div>
                        <div class="col-sm-6 col-lg-12">
                            <div class="space-8"></div>
                            <div class="space-20 visible-sm-block visible-md-block"></div>
                            <p class="cor-gray51 text-size18 p-space">{{session('username')}}</p>
                            <div class="space-2 col-lg-12"></div>
                        </div>
                    </div>
                    <div class="space-14 col-lg-12"></div>
                    <div class="row g-userinfo visible-lg-block col-lg-12">
                        <div class="col-xs-6 text-center g-userborr">
                            <a>
                                <b>0</b>
                            </a>
                            <p class="text-size14 g-usermarbot2">关注</p>
                        </div>
                        <div class="col-xs-6 text-center">
                            <a>
                                <b>0</b>
                            </a>
                            <p class="text-size14 g-usermarbot2">粉丝</p>
                        </div>
                        <div class="space-6 col-xs-12 visible-lg-block"></div>
                    </div>
                    <div class="space-14 col-lg-12"></div>
                    <div class="g-userassets text-center col-md-4 col-sm-6 col-lg-12">
                        <b class="text-size18 cor-gray51">我的资产</b>
                        <div class="space-4"></div>
                        <p class="text-size20 cor-orange"><b>￥0.00</b></p>
                        <div class="space-4"></div>
                        <div>
                            <span class="btn-big bg-gary bor-radius2 hov-bggryb0">充值</span>
                            <span class="btn-big bg-gary bor-radius2 hov-bggryb0">提现</span>
                        </div>
                        <div class="space-10"></div>
                        <div class="g-usersidebor row">
                            <span>此功能暂未开启</span>
                            <p class="space-14"></p>
                        </div>
                    </div>
                    <div class="space-14 col-lg-12 visible-lg-block"></div>
                    <div class="g-usersidelist visible-lg-block visible-md-block col-md-4 col-lg-12">
                        <div class="cor-gray51 text-size16 text-center">我的关注</div>
                        <div class="space-4"></div>
                        <div class="g-userimglistno ">
                            <p class="text-size16 cor-gray87">这里的世界静悄悄~</p>
                            <a href="/need" class="text-size16">快去逛逛</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 g-side2 martop20 col-left">
                <div class="g-userhint">
                    <div class="space-14"></div>
                    <div class="g-userhintwrap row">
                        <div class="col-lg-4 col-sm-6 text-center">
                            <div class="g-userhintdata">
                                <div class="space-20"></div>
                                <div class="g-userdatabg"></div>
                                <div class="space-10"></div>
                                <p class="cor-gray51 text-size14">我是雇主</p>
                                <p class="cor-gray51 text-size14">招募厂家解决需求</p>
                                <div class="space-10"></div>
                                <div class="g-userhintbtn"><a href="/create_need">发布需求</a></div>
                                <div class="space-20"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center visible-lg-block">
                            <div class="g-userhinthall">
                                <div class="space-20"></div>
                                <div class="g-userhallbg"></div>
                                <div class="space-10"></div>
                                <p class="cor-gray51 text-size14">我是雇主</p>
                                <p class="cor-gray51 text-size14">寻找优质厂家</p>
                                <div class="space-10"></div>
                                <div class="g-userhintbtn"><a href="/company">搜索厂家</a></div>
                                <div class="space-20"></div>
                            </div>
                        </div>
                        @if(!session('type') && session('id') !== 1)
                            <div class="col-sm-6 col-lg-4 text-center">
                                <div class="g-userhintrelease">
                                    <div class="space-20"></div>
                                    <div class="g-userreleasebg"></div>
                                    <div class="space-10"></div>

                                    <p class="cor-gray51 text-size14">成为厂家</p>
                                    <p class="cor-gray51 text-size14">提供优质产品服务</p>
                                    <div class="space-10"></div>
                                    <div class="g-userhintbtn"><a href="/establish">厂家入驻</a></div>
                                    <div class="space-20"></div>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-6 col-lg-4 text-center">
                                <div class="g-userhintrelease">
                                    <div class="space-20"></div>
                                    <div class="g-userreleasebg"></div>
                                    <div class="space-10"></div>
                                    <p class="cor-gray51 text-size14">我是厂家</p>
                                    <p class="cor-gray51 text-size14">提供优质产品服务</p>
                                    <div class="space-10"></div>
                                    <div class="g-userhintbtn"><a href="/prd">发布产品</a></div>

                                    <div class="space-20"></div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="space-10"></div>
                <div class="g-userhint g-userlist tabbable kiki_wrap">
                    <div class="clearfix g-userlisthead">
                        <ul class="pull-left text-size16 nav nav-tabs kiki_tab">
                            <li class="active" data-id="1"><a>我发布的需求</a></li>
                            @if(session('type'))
                                <div class="pull-left">|</div>
                                <li data-id="2"><a>我的入驻信息</a></li>
                                <div class="pull-left">|</div>
                                <li data-id="3"><a>我报名的需求</a></li>
                                <div class="pull-left">|</div>
                                <li data-id="4"><a>我发布的产品</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="tab-content" style="height:273px" data-id="1">
                        @if(!collect($need)->toArray()['total'])
                            <ul id="p_a_1"
                                class="g-userlistno tab-pane g-releasetask g-releasnopt g-releasfirs fade active in">
                                <li class="g-usernoinfo g-usernoinfo-noinfo">暂无需求哦！快去<a href="/create_need">发布</a>吧</li>
                            </ul>
                        @else
                            <table class="table">
                                <tr>
                                    <th>序号</th>
                                    <th>需求名称</th>
                                    <th>状态</th>
                                    <th>报名人数</th>
                                    <th>创建时间</th>
                                    <th>修改时间</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($need as $key=>$vo)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$vo->title}}</td>
                                        <td>{{$neesStatusShow[$vo->status]}}</td>
                                        <td>{{$vo->baomingshu}}</td>
                                        <td>{{$vo->created_at}}</td>
                                        <td>{{$vo->updated_at}}</td>
                                        <td><a href="/need/{{$vo->id}}" target="_blank">查看</a>
                                            @if($vo->status<=1)
                                                | <a href="/update_need/{{$vo->id}}" target="_blank">修改</a> |
                                            <a class="need_delete_a" href="javascript:;" _href="/delete_need/{{$vo->id}}">删除</a>
                                            @elseif($vo->status==2)
                                                <a class="need_over" href="javascript:;" _href="/over_need/{{$vo->id}}">完成需求</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {!! $need->render() !!}
                        @endif
                    </div>
                    <div class="tab-content" style="height:273px;display:none" data-id="2">
                            <table class="table">
                                <tr>
                                    <th>序号</th>
                                    <th>厂家名称</th>
                                    <th>状态</th>
                                    <th>创建时间</th>
                                    <th>修改时间</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($company as $key=>$vo)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$vo->company_name}}</td>
                                        <td>{{$cStatus[$vo->status]}}</td>
                                        <td>{{$vo->created_at}}</td>
                                        <td>{{$vo->updated_at}}</td>
                                        <td><a href="/company/{{$vo->id}}" target="_blank">查看</a> | <a
                                                    href="/update_company/{{$vo->id}}" target="_blank">修改</a> | <a class="c_exchange" href="javascript:;" data-cid="{{$vo->id}}">转让</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                    </div>
                    <div class="tab-content" style="height:273px;display:none" data-id="3">
                        @if(!collect($getNeeds)->toArray()['total'])
                            <ul id="p_a_1"
                                class="g-userlistno tab-pane g-releasetask g-releasnopt g-releasfirs fade active in">
                                <li class="g-usernoinfo g-usernoinfo-noinfo">暂无接收的需求哦！快去<a href="/create_need">接收</a>吧</li>
                            </ul>
                        @else
                            <table class="table">
                                <tr>
                                    <th>序号</th>
                                    <th>需求名称</th>
                                    <th>状态</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($getNeeds as $key=>$vo)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$vo->title}}</td>
                                        <td>{{$neesStatusShow[$vo->status]}}</td>
                                        <td>{{$vo->created_at}}</td>
                                        <td><a href="/need/{{$vo->id}}" target="_blank">查看</a></td>
                                    </tr>
                                @endforeach
                            </table>
                            {!! $getNeeds->render() !!}
                        @endif
                    </div>
                    <div class="tab-content" style="height:273px;display:none" data-id="4">
                        @if(!collect($prds)->toArray()['total'])
                            <ul id="p_a_1"
                                class="g-userlistno tab-pane g-releasetask g-releasnopt g-releasfirs fade active in">
                                <li class="g-usernoinfo g-usernoinfo-noinfo">暂无发布的产品哦！快去<a href="/prd">发布</a>吧</li>
                            </ul>
                        @else
                            <table class="table">
                                <tr>
                                    <th>序号</th>
                                    <th>产品名称</th>
                                    <th>状态</th>
                                    <th>价格</th>
                                    <th>库存</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($prds as $key=>$vo)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$vo->name}}</td>
                                        <td>{{$pStatus[$vo->status]}}</td>
                                        <td>{{$vo->price}}</td>
                                        <td>{{$vo->storage}}</td>
                                        <td>{{$vo->created_at}}</td>
                                        <td><a href="/prd/{{$vo->id}}" target="_blank">查看</a> | <a
                                                    href="/update_prd/{{$vo->id}}" target="_blank">修改</a> | <a
                                                    class="prd_delete_a" href="javascript:;"
                                                    _href="/delete_prd/{{$vo->id}}">删除</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {!! $prds->render() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="exchange_c">
    <div class="modal-dialog modal-lg" role="document" style="padding:10px;">
        <div class="modal-content">
            <div style="text-align: center">
                <h3 style="text-align: center">店铺转让</h3>
            </div>
            <div class="form-group mt10">
                <div class="input-group" style="padding:0px 10px">
                    <span class="input-group-addon">请输入要转入的用户名称</span>
                    <input type="text" class="form-control" name="exchange_name">
                </div>
                <div class="input-group" style="padding:0px 10px;color:red;font-size: 14px;margin-top: 10px;">
                    请谨慎操作，操作成功后，此厂家将转移至你指定的用户账户中!
                </div>
            </div>
            <div style="text-align: center">
                <button class="btn btn-large btn-default c_exchange_submit" style="margin:10px auto">提交</button>
            </div>
        </div>
    </div>
</div>
<script>
    var UID = '{{session('id')}}'|0,
        UN = '{{session('username')}}'
</script>
@include('tpl.default.footer')