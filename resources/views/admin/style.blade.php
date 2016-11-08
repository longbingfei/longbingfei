@extends('admin.home')
@section('title','应用列表')
@section('link')
    @parent
@stop
@section('stylesheet')
    @parent
@stop
@section('nav')
    @parent
@stop
@section('subject','应用列表')
@section('body')
    <div class="app-container">
        <ul>
            <li><i class="glyphicon glyphicon-file"></i></li>
            <li><i class="glyphicon glyphicon-shopping-cart"></i></li>
            <li><i class="glyphicon glyphicon-user"></i></li>
            <li><i class="glyphicon glyphicon-picture"></i></li>
            <li><i class="glyphicon glyphicon-facetime-video"></i></li>
            <li><i class="glyphicon glyphicon-calendar"></i></li>
            <li><i class="glyphicon glyphicon-tags"></i></li>
            <li><i class="glyphicon glyphicon-trash"></i></li>
            <li><i class="glyphicon glyphicon-cog"></i></li>
            <li><i class="glyphicon glyphicon-send"></i></li>
        </ul>
    </div>
@stop
