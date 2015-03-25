@extends('admin.app')

@section('header')

<h2>举报信息修改</h2>
<a class="btn btn-primary" href="{{url('admin/report/'.$report->id)}}">返回</a>
<?php $tips=$errors->all(); ?>
@foreach($tips as $k=>$e)

<p> <span class="red">:(</span>  {{ $e }} </p>

@endforeach
@stop


@section('content')


{!! Form::model($report,array('method'=>$method,'url'=>'admin/report/'.$report->id)) !!}

@unless($method=='delete')


<!-- Reply Form Field -->


<p>举报人微信号：{{$report->user->wechat}}</p>
<p>举报人qq：{{$report->user->qq}}</p>
<p>举报人手机号：{{$report->user->phone}}</p>

<p>被举报人微信号：{{$report->wechat}}</p>
<p>被举报人QQ号：{{$report->qq}}</p>
<p>被举报人手机号：{{$report->phone}}</p>

<p>原因: {{$report->case}}</p>

<div class="form-group">

    {!! Form::label('reply','回复 :') !!}
    {!! Form::textarea('reply',$report->reply,['class'=>'form-control']) !!}

    {!!Form::hidden('user_id',$report->user_id,['class'=>'form-control'])!!}

</div>



{!! Form::submit('保存',array('class'=>'btn btn-default')) !!}
@else
{!! Form::submit('删除',array('class'=>'btn btn-default')) !!}

@endif
{!! Form::close() !!}




@stop