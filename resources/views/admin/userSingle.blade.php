@extends('admin.app')


@section('header')

    <h2>用户信息 </h2>
    <a class="btn btn-primary" href="{{url('admin/user/'.$user->id.'/edit')}}">编辑</a>

    <a class="btn btn-primary" href="{{url('admin/user/'.$user->id.'/Delete')}}">删除</a>

    <a class="btn btn-primary" href="{{url('admin/user')}}">返回</a>
    @stop


@section('content')

    <p>代理微信：{{$user->name}}</p>
    <p>邮箱：{{$user->email}}</p>
    <p>昵称：{{$user->nick_name}}</p>
    <p>用户类型：{{$user->type->type_name}}</p>
    <p>qq：{{$user->qq}}</p>
    <p>地址：{{$user->address}}</p>
    <p>手机：{{$user->phone}}</p>
    <p>微信号：{{$user->wechat}}</p>
    <p>支付宝帐号：{{$user->alipay}}</p>
    <p>积分：{{$user->score}}</p>

    @stop