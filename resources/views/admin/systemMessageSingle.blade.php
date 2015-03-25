@extends("admin.app")

@section('header')
<a class="btn btn-primary" href="{{url('admin/system-message')}}">返回</a>
<h2>{{$message->title}}</h2>
<a class="btn btn-primary" href="{{url('admin/system-message/'.$message->id.'/edit')}}"><span>编辑</span></a>
<a class="btn btn-primary" href="{{url('admin/system-message/'.$message->id.'/delete')}}"><span>删除</span></a>
    @stop

@section('content')

    <div class="container">
        @if(!$message->is_show_every)
            @if($message->user!=NULL)
            <p>发送某人 :{{$message->user->name}}</p>
                @endif
            @else
            <p>发送所有人 :{{$message->is_show_every}}</p>
        @endif
        <div>
        {!! $message->content !!}
        </div>
    </div>


@stop