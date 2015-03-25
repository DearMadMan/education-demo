@extends('admin.app')


@section('header')

    <h2>score_log info </h2>
    <a href="{{url('admin/score_log/'.$score_log->id.'/edit')}}">Edit</a>

    <a href="{{url('admin/score_log/'.$score_log->id.'/Delete')}}">Delete</a>

    <a href="{{url('admin/score_log')}}">Back to view</a>
@stop


@section('content')

    <p>用户名：{{$score_log->name}}</p>
    <p>邮箱：{{$score_log->email}}</p>
    <p>昵称：{{$score_log->nick_name}}</p>
    <p>用户类型：{{$score_log->type->type_name}}</p>
    <p>qq：{{$score_log->qq}}</p>
    <p>地址：{{$score_log->address}}</p>
    <p>手机：{{$score_log->phone}}</p>
    <p>微信号：{{$score_log->wechat}}</p>
    <p>支付宝帐号：{{$score_log->alipay}}</p>
    <p>积分：{{$score_log->score}}</p>

@stop