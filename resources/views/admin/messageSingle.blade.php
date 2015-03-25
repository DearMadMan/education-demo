@extends('admin.app')


@section('header')

        <h2>留言信息 </h2>
    <a class="btn btn-primary" href="{{url('admin/message/'.$message->id.'/edit')}}">编辑</a>


    <a class="btn btn-primary" href="{{url('admin/message')}}">返回</a>
@stop


@section('content')

    <p>用户ID：{{$message->user_id}}</p>
    <p>标题：{{$message->title}}</p>
    <p>内容：{{$message->content}}</p>
    <p>回复：{{$message->reply}}</p>
    <p>是否显示：{{$message->is_show}}</p>
    <p>创建时间：{{$message->created_at}}</p>


@stop