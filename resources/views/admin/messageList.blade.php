@extends('admin.app')


@section('header')
    <script src="{{url('/')}}/js/delete.js"></script>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <h2>留言列表</h2>

    <a class="btn btn-primary" href="{{url('admin/message/create')}}"><span>新建</span></a>
    <a class="btn btn-primary" href="{{url('admin')}}">返回</a>
    <a class="btn btn-primary" href="javascript:is_delete('messages');">删除</a>
@stop


@section('content')

        @foreach($messages as $message)
            <div class="container mg-10">
            <div class="pull-left">     <input type="checkbox" name="check" value="{{$message->id}}"/>&nbsp;&nbsp;<a href="{{url('admin/user/').'/'.$message->user_id}}">用户ID:{{$message->user_id}}</a>    &nbsp;&nbsp;   <a href="{{url('admin/message/'.$message->id)}}"><span>{{$message->title}} </span></a>
            </div>
            <div class="pull-right">
                <span>{{$message->created_at}}</span>
                <span>
                    @if($message->is_show)
                        <span class="red">已显示</span>
                    @else
                        <span class="green">不显示</span>
                    @endif
                </span>
            </div>
            </div>
        @endforeach

    <div class="container">
        {!! $messages->render() !!}
    </div>
@stop