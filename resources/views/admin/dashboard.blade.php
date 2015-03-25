@extends('admin.app')


@section('header')
    <h2>管理中心<div class="pull-right"><a class="btn btn-primary" href="{{url('admin/config')}}">配置</a>&nbsp;&nbsp;<a class="btn btn-primary" href="{{url('user/logout')}}">登出</a></div></h2>

    @stop


@section('content')

    <div class="container-fluid">
        <ul class="user-nav">
            <li class="dashboard-color1"><a href="{{url('admin/system-message')}}">站内信息</a></li>
            <li class="dashboard-color2" ><a href="{{url('admin/user/1/edit')}}">我的资料</a></li>
            <li class="dashboard-color3"><a href="{{url('admin/article-type/2')}}">内部公告</a></li>
            <li class="dashboard-color4"><a href="{{url('admin/message')}}">代理分享</a></li>
            <li class="dashboard-color5"><a href="{{url('admin/cash')}}">积分提现</a></li>
            <li class="dashboard-color6"><a href="{{url('admin/article-type/3')}}">初级专区</a></li>
            <li class="dashboard-color7"><a href="{{url('admin/article-type/4')}}">高级专区</a></li>
            <li class="dashboard-color8"><a href="{{url('admin/report')}}">举报专区</a></li>
            <li class="dashboard-color9"><a href="{{url('admin/user')}}">会员管理</a></li>
        </ul>
    </div>
@stop