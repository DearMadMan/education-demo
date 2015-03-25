@extends('admin.app')


@section('header')

    <h2>举报信息 </h2>
    <a class="btn btn-primary" href="{{url('admin/report/'.$report->id.'/edit')}}">编辑</a>


    <a class="btn btn-primary" href="{{url('admin/report')}}">返回</a>
@stop


@section('content')

    <p>举报人微信号：{{$report->user->wechat}}</p>
    <p>举报人qq：{{$report->user->qq}}</p>
    <p>举报人手机：{{$report->user->phone}}</p>

    <p>被举报人微信号：{{$report->wechat}}</p>
    <p>被举报人qq：{{$report->qq}}</p>
    <p>被举报人手机：{{$report->phone}}</p>

    <p>原因: {{$report->case}}</p>


    <p>回复：{{$report->reply}}</p>
    <p>举报时间：{{$report->created_at}}</p>



@stop