@extends('admin.app')

@section('header')
    <h2>站内信息</h2>
    @if($list)
        <a class="btn btn-primary" href="{{url('admin/system-message/create')}}">新建</a>
    @endif

    <a class="btn btn-primary" href="{{url('admin')}}">返回</a>
    @stop

@section('content')
@foreach($messages as $message)
    <div class="container-fluid system-message">
    <div class="media">
        <a href="{{url('admin/system-message/'.$message->id.'')}}">
        <div class="media-left">

                <img class="media-object" src="{{url('images/admin.jpg')}}" alt="...">

        </div>
        <div class="media-body">
            <h4 class="media-heading">{{$message->title}}</h4>
            {!! $message->content !!}
        </div>
        </a>
    </div>
    @endforeach
    </div>
<div class="container">
    {!! $messages->render() !!}
</div>

    @stop