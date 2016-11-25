@extends('admin.home')
@section('title','用户与权限')
@section('link')
    @parent
@stop
@section('stylesheet')
    @parent
    .auth-table tr td{
    vertical-align:middle !important
    }
    .auth-table tr td img{
    width:40px;
    height:40px;
    }
    i:hover{
    color:#337ab7
    }
    .auth-td span{
    display:inline-block;
    height:20px;
    width:70px;
    font-weight:500;
    box-shadow:1px 1px 1px 1px coral;
    }
    .modal{
    color:#337ab7
    }
    .permission-td div{
    height: 40px;
    margin: 0 auto;
    text-align:left
    padding:0px 5px;
    overflow:hidden;
    }
    .permission-td div span{
    width: 30px;
    font-size: 10px;
    folat: left !important;
    font-weight:500;
    box-shadow:1px 1px 2px 1px mediumpurple;
    }
    .all-auth{
        display:inline-block;
        height:20px;
        width:70px;
        color:mediumpurple;
        font-weight: 600;
        box-shadow:1px 1px 2px 1px mediumpurple;
    }
    .auth-tab{
        height:300px !important;
        over-flow:scroll;
        font-size: 16px;
        font-weight:500;
    }
    .auth-tab input{
        display: inline-block;
        width: 200px;
        height: 30px;
        text-align:center;
    }
    .auth-tab ul li{
        list-style-type:none;
        padding:5px;
        margin-right:5px;
        {{--width: 30px;--}}
        font-size: 10px;
        float: left !important;
        font-weight:500;
        box-shadow:1px 1px 2px 1px mediumpurple;
    }

@stop
@section('nav')
    @parent
@stop
@section('subject','用户与权限')
@section('body')
    @parent
    <div class="container">
        <a class="btn btn-default top-btn" data-toggle="modal" data-target="#auth-edit-modal" onclick="load_role()">
            <i class="glyphicon glyphicon-plus-sign"></i>&nbsp;新增用户
        </a>
        <div class="auth-main">
            <table class="table table-hover auth-table">
                <tr class="active">
                    <td width="10%">头像</td>
                    <td width="10%">用户名</td>
                    <td width="20%">角色</td>
                    <td width="40%">权限</td>
                    <td width="10%">创建时间</td>
                    <td width="10%">操作</td>
                </tr>
                @if(!$users['total'])
                    <tr>
                        <td class="table-no-data" colspan="6">无相关数据</td>
                    </tr>
                @else
                    @foreach($users['data'] as $key => $vo)
                        <tr>
                            <td>
                                <div>
                                    <img src="{{empty($vo['avatar']) ? url('default/images/default_avatar.jpeg') : url($vo['avatar']['thumb'])}}">
                                </div>
                            </td>
                            <td>
                                <span style="font-weight: 600;color:steelblue" class="ellipsis_ padding_move"
                                      data-toggle="modal"
                                      data-target="#auth-edit-modal" title="编辑">{{$vo['username']}}</span>
                            </td>
                            <td class="auth-td">
                                @if($vo['status'] == 3)
                                    <span class="ellipsis_" style="color:coral">超级管理员</span>
                                @elseif($vo['status'] == 2)
                                    <span class="ellipsis_" style="color:coral">管理员</span>
                                @else
                                    <span class="ellipsis_" style="color:coral">用户</span>
                                @endif
                            </td>
                            <td class="permission-td">
                                @if($vo['status'] == 3)
                                    <span class="all-auth">所有权限</span>
                                @else
                                    <div>
                                        @foreach($vo['permissions'] as $k => $v)
                                            <span>{{$v}}</span>
                                        @endforeach
                                    </div>
                                @endif
                            </td>
                            <td>{{Date('Y/m/d',strtotime($vo['created_at']))}}</td>
                            <td data-id="{{$vo['id']}}">
                                @if($vo['status'] != 3)
                                    <i class="auth-del glyphicon glyphicon-remove-circle" title="删除"></i>&nbsp
                                    @if($vo['status'] == -1)
                                        <i class="glyphicon glyphicon-lock" title="已锁定"></i>&nbsp
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <td colspan="6">
                        <div class="painate" style="float:right;margin-top:2px">
                            <ul id="pagination-digg">
                                <li><a href="javascript:void(0)">第{{$users['current_page']}}页</a></li>
                                @for($i = 1;$i<=$users['last_page'];$i++)
                                    <li><a href="?page={{$i}}">{{$i}}</a></li>
                                @endfor
                                <li class="next">
                                    <a href="javascript:void(0)">共{{$users['last_page']}}页/计{{$users['total']}}条</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="modal fade auth-fade" style="margin-top:115px;" id="auth-edit-modal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">x</span></button>
                    <h4 class="modal-title" id="edit-modal">新增用户</h4>
                </div>
                <div class="modal-body">
                    <div class="auth-tab">
                        用户名:&nbsp;&nbsp;<input type="text"><hr/>
                        角&nbsp;&nbsp;&nbsp;&nbsp;色:&nbsp;&nbsp;<hr/>
                        <ul></ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary">保存</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function load_role(){

        }
    </script>
@stop