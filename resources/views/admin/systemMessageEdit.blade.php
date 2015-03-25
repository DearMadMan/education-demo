@extends('admin.app')

@section('header')
    <a class="btn btn-primary" href="{{url('admin/system-message')}}">返回</a>
    @endsection
<h2>
    @if($method == 'post')
        新建
        @elseif($method=="delete")
       删除 ?
    @else
        编辑
    @endif
</h2>
@stop

@section('content')



    {!! Form::model($message,array('method'=>$method,'url'=>'admin/system-message/'.$message->id)) !!}

    @unless($method=='delete')
        
        <!-- Title Form Field -->
        
            <div class="form-group">
        
                {!! Form::label('title','标题 :') !!}
                {!! Form::text('title',$message->title,['class'=>'form-control']) !!}
        
            </div>
        
        
        <!-- User_id Form Field -->
        
            <div class="form-group">
        
                {!! Form::label('user_id','用户ID :') !!}
                {!! Form::text('user_id',null,['class'=>'form-control']) !!}
        
            </div>
        
        <!-- Is_show_everyone Form Field -->
        
            <div class="form-group">
        
                {!! Form::label('is_show_everyone','发给所有人 :') !!}
                {!! Form::select('is_show_everyone',['0'=>'否','1'=>'是'],$message->is_show_everyone,['class'=>'form-control']) !!}
        
            </div>
        
        <!-- Content Form Field -->
        
            <div class="form-group">
        
                {!! Form::label('content','内容 :') !!}
                {!! Form::text('content',$message->content,['class'=>'form-control']) !!}
        
            </div>
        
        
        
        
    {!! Form::submit('提交',array('class'=>'btn btn-default')) !!}
    @else
        {!! Form::submit('删除',array('class'=>'btn btn-default')) !!}

    @endif
    {!! Form::close() !!}


@stop