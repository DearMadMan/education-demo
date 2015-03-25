@extends('user')


@section('header')
    <script src="{{url('/')}}/js/system-message.js"></script>
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

    <div class="container nopadding system-message-header">
        <div class="pull-left">
            <a href="{{redirect()->back()->getTargetUrl()}}">
            <i class="iconfont">&#xe650;</i>
            </a>
        </div>
        <div class="pull-right">
            <a href="{{url('user/logout')}}" class="btn btn-link">登出</a>
        </div>
        <h5>站内信息</h5>
    </div>

    @stop




@section('content')
    <div class="container-fluid system-message">
        @foreach($messages as $message)

            <div class="media">
                @if($message->is_show_everyone!=1)
                    <div class="close" data="{{$message->id}}">x</div>
                    @endif
                <div class="media-left">

                        <img class="media-object" src="{{url('images/admin.jpg')}}" alt="...">

                </div>
                <div class="media-body">
                    <h4 class="media-heading red em1-1">{{$message->title}}</h4>
                    {!! $message->content !!}
                </div>
            </div>
        @endforeach
        <div class="container">
            {!! $messages->render() !!}
        </div>
    </div>

@stop