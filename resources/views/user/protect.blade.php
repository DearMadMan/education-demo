@extends('user')

@section('header')

    <div class="container nopadding system-message-header">
        <div class="pull-left">
            <a href="{{url('user')}}">
                <i class="iconfont">&#xe650;</i>
            </a>
        </div>
        <h5>密码保护验证</h5>
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
        {!!Form::open(['url'=>'user/repassword','method'=>'post','class'=>'form-horizontal'])!!}

       <!-- Repassword Form Field -->
       
           <div class="form-group mg-10">
       
               {!! Form::label('repassword','密保 :',['class'=>'col-xs-3 control-label']) !!}
               <div class="col-xs-9">
               {!! Form::text('repassword',null,['class'=>'form-control','placeholder'=>'请输入密保']) !!}

                   <!-- Url Form Field -->
                   

                   

                           {!! Form::hidden('url',$url,['class'=>'form-control']) !!}
                   

               </div>
           </div>

        <div class="form-group">
            <div class="text-center">
                {!! Form::submit('提交',array('class'=>'form-control btn btn-primary')) !!}

            </div>

        </div>



        {!!form::close()!!}


    </div>





@stop