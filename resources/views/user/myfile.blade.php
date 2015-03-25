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
        <h5>我的资料</h5>
    </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>提示!</strong> 这里有一些输入错误.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
        {!!Form::open(['url'=>'user/myfile','method'=>'post','class'=>'form-horizontal'])!!}

        <!-- Name Form Field -->
        
            <div class="form-group mg-10">
        
           {!! Form::label('name','代理微信:',['class'=>'col-xs-3 control-label']) !!}
               
            <div class="col-xs-5">
              <p class="form-control-static">{{$user->name}}</p>
            </div>
                <div class="col-xs-4">
                    <a href="{{url('user/modify-password')}}" class="btn btn-sm btn-default">
                       改密
                    </a>

                </div>
        
            </div>

        
        <!-- Email Form Field -->
        
            <div class="form-group">
        
           {!! Form::label('email','邮箱:',['class'=>'col-xs-3 control-label']) !!}
               
            <div class="col-xs-9">
              <p class="form-control-static">{{$user->email}}</p>
            </div>
        
            </div>
        
        <!-- User_type Form Field -->

            <div class="form-group">

           {!! Form::label('user_type','会员:',['class'=>'col-xs-3 control-label']) !!}

            <div class="col-xs-9">
              <p class="form-control-static">{{$user->type->type_name}}</p>
            </div>

            </div>
        
        <!-- Score Form Field -->

            <div class="form-group">

           {!! Form::label('score','积分:',['class'=>'col-xs-3 control-label']) !!}

            <div class="col-xs-9">
              <p class="form-control-static">{{$user->score}}</p>
            </div>

            </div>
       
        <!-- Nick_name Form Field -->
        
            <div class="form-group">
        
                {!! Form::label('nick_name','姓名:',['class'=>'col-xs-3 control-label']) !!}
                <div class="col-xs-9">
                {!! Form::text('nick_name',$user->nick_name,['class'=>'form-control']) !!}
                </div>
            </div>

        <!-- Alipay Form Field -->

        <div class="form-group">

            {!! Form::label('alipay','支付宝:',['class'=>'col-xs-3 control-label']) !!}
            <div class="col-xs-9">
                {!! Form::text('alipay',$user->alipay,['class'=>'form-control']) !!}
            </div>
        </div>




        <!-- Qq Form Field -->
        
            <div class="form-group">
        
                {!! Form::label('qq','QQ:',['class'=>'col-xs-3 control-label']) !!}
                <div class="col-xs-9">
                {!! Form::text('qq',$user->qq,['class'=>'form-control']) !!}
                </div>
            </div>


        <!-- Wechat Form Field -->
        
            <div class="form-group">
        
                {!! Form::label('wechat','微信号:',['class'=>'col-xs-3 control-label']) !!}
                <div class="col-xs-9">
                {!! Form::text('wechat',$user->wechat,['class'=>'form-control']) !!}
                </div>
            </div>

        
        <!-- Address Form Field -->
        
            <div class="form-group">
        
                {!! Form::label('address','地址:',['class'=>'col-xs-3 control-label']) !!}
                <div class="col-xs-9">
                {!! Form::text('address',$user->address,['class'=>'form-control']) !!}
                </div>
            </div>



        <!-- Phone Form Field -->

            <div class="form-group">

                {!! Form::label('phone','手机号:',['class'=>'col-xs-3 control-label']) !!}
                <div class="col-xs-9">
                {!! Form::text('phone',$user->phone,['class'=>'form-control']) !!}
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