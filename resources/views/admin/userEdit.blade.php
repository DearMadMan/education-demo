@extends('admin.app')

@section('header')

    <h2>用户信息修改</h2>
    <a class="btn btn-primary" href="{{url('admin/user/'.$user->id)}}">返回</a>
    <?php $tips=$errors->all(); ?>
@foreach($tips as $k=>$e)

  <p> <span class="red">:(</span>  {{ $e }} </p>

    @endforeach
    @stop


@section('content')


    {!! Form::model($user,array('method'=>$method,'url'=>'admin/user/'.$user->id)) !!}

    @unless($method=='delete')
        
<!-- Name Form Field -->

    <div class="form-group">

        {!! Form::label('name','代理微信 :') !!}
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


<!-- UserType Form Field -->

<div class="form-group">

    {!! Form::label('user_type_id','用户分类 :') !!}
    {!! Form::select('user_type_id',$type,$user->type->id,['class'=>'form-control']) !!}

</div>

<!-- Password Form Field -->

    <div class="form-group">

        {!! Form::label('password','密码 :') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}

    </div>

<!-- Repassword Form Field -->

    <div class="form-group">

        {!! Form::label('repassword','密保 :') !!}
        {!! Form::password('repassword',['class'=>'form-control']) !!}

    </div>

<!-- Qq Form Field -->

    <div class="form-group">

        {!! Form::label('qq','Qq :') !!}
        {!! Form::text('qq',null,['class'=>'form-control']) !!}

    </div>

<!-- Address Form Field -->

    <div class="form-group">

        {!! Form::label('address','地址 :') !!}
        {!! Form::text('address',null,['class'=>'form-control']) !!}

    </div>

<!-- Phone Form Field -->

    <div class="form-group">

        {!! Form::label('phone','手机 :') !!}
        {!! Form::text('phone',null,['class'=>'form-control']) !!}

    </div>

<!-- Wechat Form Field -->

    <div class="form-group">

        {!! Form::label('wechat','微信 :') !!}
        {!! Form::text('wechat',null,['class'=>'form-control']) !!}

    </div>


<!-- Alipay Form Field -->

    <div class="form-group">

        {!! Form::label('alipay','支付宝 :') !!}
        {!! Form::text('alipay',null,['class'=>'form-control']) !!}

    </div>

<!-- Score Form Field -->

    <div class="form-group">

        {!! Form::label('score','积分 :') !!}
        {!! Form::text('score',null,['class'=>'form-control']) !!}

    </div>





        {!! Form::submit('更新',array('class'=>'btn btn-default')) !!}
        @else
            {!! Form::submit('删除',array('class'=>'btn btn-default')) !!}

        @endif
        {!! Form::close() !!}




    @stop