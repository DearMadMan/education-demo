@extends('user')

@section('header')

    <div class="container nopadding system-message-header">
        <div class="pull-left">
            <a href="{{url('user')}}">
                <i class="iconfont">&#xe650;</i>
            </a>
        </div>
        <div class="pull-right">
            <a href="{{url('user/logout')}}" class="btn btn-link">登出</a>
        </div>
        <h5>举报专区</h5>
    </div>
    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>提示!</strong> 这里有一些输入错误.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>* {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>


    @if(Session::has('tips'))
        <div class="container nopadding">
            <div class="alert alert-success">
                <i class="iconfont">&#xe6b1;</i>
                {{Session::get('tips')}}

            </div>
        </div>
    @endif

@stop

@section('content')


    <div class="container myfile mg-10">
        <div class="mg-10"></div>
        {!!Form::open(['url'=>'user/report','method'=>'post','class'=>'form-horizontal'])!!}


        <!-- Nick_name Form Field -->

        <div class="form-group">

            {!! Form::label('wechat','微信:',['class'=>'col-xs-3 control-label']) !!}
            <div class="col-xs-9">
                {!! Form::text('wechat',null,['class'=>'form-control','placeholder'=>'被举报者微信号']) !!}
            </div>
        </div>




        <!-- Password Form Field -->

        <div class="form-group">

            {!! Form::label('phone','手机:',['class'=>'col-xs-3 control-label']) !!}
            <div class="col-xs-9">
                {!! Form::text('phone',null,['class'=>'form-control','placeholder'=>'被举报者手机号']) !!}
            </div>
        </div>


        <!-- Qq Form Field -->

        <div class="form-group">

            {!! Form::label('qq','QQ:',['class'=>'col-xs-3 control-label']) !!}
            <div class="col-xs-9">
                {!! Form::text('qq',null,['class'=>'form-control','placeholder'=>'被举报者QQ号']) !!}
            </div>
        </div>

        <!-- Case Form Field -->
        
            <div class="form-group">
        
                {!! Form::label('case','举报原因 :',['class'=>'col-xs-3 control-label']) !!}
                <div class="col-xs-9">
                {!! Form::textarea('case',null,['class'=>'form-control']) !!}
                </div>
            </div>
        
        
        
        <div class="form-group">
            <div class="text-center">
                {!! Form::submit('提交',array('class'=>'btn btn-default')) !!}
            </div>

        </div>



        {!!form::close()!!}


    </div>





@stop