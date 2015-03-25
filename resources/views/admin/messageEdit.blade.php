@extends('admin.app')

@section('header')

    <h2>留言修改</h2>
    <a class="btn btn-primary" href="{{url('admin/message/'.$message->id)}}">返回</a>
    <?php $tips=$errors->all(); ?>
    @foreach($tips as $k=>$e)

        <p> <span class="red">:(</span>  {{ $e }} </p>

    @endforeach
@stop


@section('content')


    {!! Form::model($message,array('method'=>$method,'url'=>'admin/message/'.$message->id)) !!}

    @unless($method=='delete')

      <!-- Title Form Field -->
      
          <div class="form-group">
      
              {!! Form::label('title','标题 :') !!}
              @if($method=='put')
              {!! Form::text('title',null,['disabled'=>true,'class'=>'form-control']) !!}
              @else
              {!! Form::text('title',$message->title,['class'=>'form-control']) !!}
                  @endif
          </div>

      <!-- Content Form Field -->

          <div class="form-group">

              {!! Form::label('content','内容 :') !!}
              {!! Form::textarea('content',$message->content,['class'=>'form-control']) !!}

          </div>

      <!-- Award Form Field -->

          <div class="form-group">

              {!! Form::label('award','奖励 :',['class'=>'col-xs-3 control-label']) !!}
              <div class="col-xs-9">
              {!! Form::text('award',$message->award,['class'=>'form-control']) !!}
              </div>
          </div>

        <!-- Reply Form Field -->
        
            <div class="form-group">
        
                {!! Form::label('reply','回复 :') !!}
                {!! Form::textarea('reply',null,['class'=>'form-control']) !!}
        
            </div>

      <!-- Is_show Form Field -->
      
          <div class="form-group">
      
              {!! Form::label('is_show','审核 :') !!}
              {!! Form::select('is_show',[0=>'不通过',1=>'通过'],$message->is_show,['class'=>'form-control']) !!}
      
          </div>


        {!! Form::submit('保存',array('class'=>'btn btn-default')) !!}
        @else
            {!! Form::submit('删除',array('class'=>'btn btn-default')) !!}

        @endif
        {!! Form::close() !!}




@stop