@extends('admin.app')

@section('header')

    <h2>积分日志</h2>
    <a class="btn btn-primary" href="{{url('admin/score_log/'.$score_log->id)}}">返回</a>
    <?php $tips=$errors->all(); ?>
    @foreach($tips as $k=>$e)

        <p> <span class="red">:(</span>  {{ $e }} </p>

    @endforeach
@stop


@section('content')


    {!! Form::model($score_log,array('method'=>$method,'url'=>'admin/score_log/'.$score_log->id)) !!}

    @unless($method=='delete')

        <!-- Name Form Field -->

        <div class="form-group">

            {!! Form::label('name','用户名 :') !!}
            @if ($method=='put')
                {!! Form::text('name',null,['class'=>'form-control','disabled'=>true]) !!}
            @else
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            @endif
        </div>

        <!-- Email Form Field -->

        <div class="form-group">

            {!! Form::label('email','邮箱 :') !!}
            @if ($method=='put')
                {!! Form::email('email',null,['class'=>'form-control','disabled'=>true]) !!}
            @else
                {!! Form::email('email',null,['class'=>'form-control']) !!}
            @endif
        </div>

        <!-- Nick_name Form Field -->

        <div class="form-group">

            {!! Form::label('nick_name','昵称 :') !!}
            {!! Form::text('nick_name',null,['class'=>'form-control']) !!}

        </div>


        <!-- score_logType Form Field -->

        <div class="form-group">

            {!! Form::label('score_log_type_id','类型 :') !!}
            {!! Form::select('score_log_type_id',$type,$score_log->type->id,['class'=>'form-control']) !!}

        </div>

        <!-- Password Form Field -->

        <div class="form-group">

            {!! Form::label('password','密码 :') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}

        </div>

        <!-- Repassword Form Field -->

        <div class="form-group">

            {!! Form::label('repassword','Repassword :') !!}
            {!! Form::password('repassword',['class'=>'form-control']) !!}

        </div>

        <!-- Qq Form Field -->

        <div class="form-group">

            {!! Form::label('qq','Qq :') !!}
            {!! Form::text('qq',null,['class'=>'form-control']) !!}

        </div>

        <!-- Address Form Field -->

        <div class="form-group">

            {!! Form::label('address','Address :') !!}
            {!! Form::text('address',null,['class'=>'form-control']) !!}

        </div>

        <!-- Phone Form Field -->

        <div class="form-group">

            {!! Form::label('phone','Phone :') !!}
            {!! Form::text('phone',null,['class'=>'form-control']) !!}

        </div>

        <!-- Wechat Form Field -->

        <div class="form-group">

            {!! Form::label('wechat','Wechat :') !!}
            {!! Form::text('wechat',null,['class'=>'form-control']) !!}

        </div>


        <!-- Alipay Form Field -->

        <div class="form-group">

            {!! Form::label('alipay','Alipay :') !!}
            {!! Form::text('alipay',null,['class'=>'form-control']) !!}

        </div>

        <!-- Score Form Field -->

        <div class="form-group">

            {!! Form::label('score','Score :') !!}
            {!! Form::text('score',null,['class'=>'form-control']) !!}

        </div>





        {!! Form::submit('Save',array('class'=>'btn btn-default')) !!}
        @else
            {!! Form::submit('Delete',array('class'=>'btn btn-default')) !!}

        @endif
        {!! Form::close() !!}




@stop