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
        <h5>改密</h5>
    </div>


    @if(Session::has('tips'))
        <div class="container nopadding">
            <div class="alert alert-success">
                <i class="iconfont">&#xe6b6;</i>
                {{Session::get('tips')}}

            </div>
        </div>
    @endif

@stop

@section('content')


    <div class="container myfile mg-10">
        {!!Form::open(['url'=>'user/modify-password','method'=>'post','class'=>'form-horizontal'])!!}

        <!-- Name Form Field -->

        <div class="form-group mg-10">


        <!-- Password Form Field -->

        <div class="form-group">

            {!! Form::label('password','旧密码:',['class'=>'col-xs-3 control-label']) !!}
            <div class="col-xs-9">
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>
        </div>
        <!-- Password Form Field -->

        <div class="form-group">

            {!! Form::label('new_password','新密码:',['class'=>'col-xs-3 control-label']) !!}
            <div class="col-xs-9">
                {!! Form::password('new_password',['class'=>'form-control']) !!}
            </div>
        </div>
        <!-- Password Form Field -->

        <div class="form-group">

            {!! Form::label('new_password_confirm','新密码效验:',['class'=>'col-xs-3 control-label']) !!}
            <div class="col-xs-9">
                {!! Form::password('new_password_confirmation',['class'=>'form-control']) !!}
            </div>
        </div>
        <!-- Password Form Field -->

        <div class="form-group">

            {!! Form::label('repassword','新密保:',['class'=>'col-xs-3 control-label']) !!}
            <div class="col-xs-9">
                {!! Form::password('repassword',['class'=>'form-control','placeholder'=>'为空即不修改']) !!}
            </div>
        </div>



        <div class="form-group">
            <div class="text-center">
                {!! Form::submit('保存',array('class'=>'btn btn-default')) !!}

            </div>

        </div>



        {!!form::close()!!}


    </div>





@stop