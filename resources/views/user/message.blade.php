@extends('user')


@section('header')

    <div class="container nopadding system-message-header">
        <div class="pull-left">
            <a href="{{redirect()->back()->getTargetUrl()}}">
                <i class="iconfont">&#xe650;</i>
            </a>
        </div>
        <div class="pull-right">
            <a href="{{url('user/logout')}}" class="btn btn-link">登出</a>
        </div>
        <h5>代理分享</h5>
    </div>

@stop




@section('content')
    <div class="container-fluid system-message mg-b-50">
        @foreach($messages as $message)

            <div class="media">
                <div class="media-left">

                    <img class="media-object" src="{{url('images/user.jpg')}}" alt="...">

                </div>
                <div class="media-body">
                    <h4 class="media-heading"></h4>
                    <div class="container">
                        {{ $message->content }}
                    </div>
                    <div class="award"><span class="red">+{{$message->award}}</span></div>


                </div>
            </div>
            @if($message->reply!='')
                <div class="media">

                    <div class="media-body">
                       <div class="red"> {!! $message->reply !!}</div>

                    </div>
                    <div class="media-right">

                        <img class="media-object" src="{{url('images/admin.jpg')}}" alt="...">

                    </div>
                </div>
                @endif
        @endforeach
        <div class="container">
            {!! $messages->render() !!}
        </div>
    </div>

        <div class="container mg-10 send">
            {!!Form::open(['url'=>'user/message','method'=>'post','class'=>'form-horizontal'])!!}

            <!-- content Form Field -->
            
                <div class="form-group">
            

                    <div class="col-xs-9">
                    {!! Form::text('content',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="col-xs-2">
                    {!!Form::submit('发送',['class'=>'from-control btn btn-primary'])!!}
                    </div>
                </div>

            {!!form::close()!!}

        </div>



@stop