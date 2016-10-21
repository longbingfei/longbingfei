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
    display:inline;
    height:20px;
    font-weight:500;
    background-color:lightgreen;
    box-shadow:1px 1px 1px 1px green;
    }
    .modal{
    color:#337ab7
    }
@stop
@section('nav')
    @parent
@stop
@section('subject','用户与权限')
@section('body')
    @parent
    <div class="container">
        <a class="btn btn-default top-btn" href=""><i class="glyphicon glyphicon-cog"></i>&nbsp权限配置</a>
        <a class="btn btn-default top-btn" href=""><i class="glyphicon glyphicon-plus-sign"></i>&nbsp新增用户</a>
        <div class="auth-main">
            <table class="table table-hover auth-table">
                <tr class="active">
                    <td width="8%">选择</td>
                    <td width="22%">头像</td>
                    <td width="10%">用户名</td>
                    <td width="20%">角色</td>
                    <td width="10%">创建时间</td>
                    <td width="30%">操作</td>
                </tr>
                @if(!$users['total'])
                    <tr>
                        <td class="table-no-data" colspan="6">无相关数据</td>
                    </tr>
                @else
                    @foreach($users['data'] as $key => $vo)
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>
                                <div>
                                    <img src="{{empty($vo['avatar']) ? url('default/images/default_avatar.jpeg') : url($vo['avatar']['thumb'])}}">
                                </div>
                            </td>
                            <td>
                                <a class="ellipsis_ padding_move" href="">{{$vo['username']}}</a>
                            </td>
                            <td class="auth-td">
                                @if($vo['status'] == 3)
                                    <span style="color:mediumpurple">超级管理员</span>
                                @elseif($vo['status'] == 2)
                                    <span style="color:coral">管理员</span>
                                @else
                                    <span style="color:darkgrey">用户</span>
                                @endif
                            </td>
                            <td>{{Date('Y/m/d',strtotime($vo['created_at']))}}</td>
                            <td data-id="{{$vo['id']}}">
                                <i class="auth-edit glyphicon glyphicon-edit" data-toggle="modal"
                                   data-target="#auth-edit-modal" title="编辑"></i>&nbsp
                                <i class="auth-del glyphicon glyphicon-remove-circle" title="删除"></i>&nbsp
                                @if($vo['status'] == -1)
                                    <i class="glyphicon glyphicon-lock" title="已锁定"></i>&nbsp
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
    <!-- auth-edit-modal -->
    <div class="modal fade" id="auth-edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">x</span></button>
                    <h4 class="modal-title" id="edit-modal">用户权限修改</h4>
                </div>
                <div class="modal-body">
                    123
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary">保存</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.auth-main').on('click', '.auth-edit', function () {

        })
    </script>
@stop