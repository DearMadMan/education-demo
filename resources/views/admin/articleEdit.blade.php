@extends('admin.app')

@section('header')
    <script src="{{url('plugin/ckeditor/ckeditor.js')}}"></script>
    <h2>Modify articleInfo</h2>
    <a class="btn btn-primary" href="{{url('admin/article/'.$article->id)}}">返回</a>
    <?php $tips=$errors->all(); ?>
    @foreach($tips as $k=>$e)

        <p> <span class="red">:(</span>  {{ $e }} </p>

    @endforeach
@stop


@section('content')


    {!! Form::model($article,array('method'=>$method,'url'=>'admin/article/'.$article->id,'enctype'=>'multipart/form-data')) !!}

    @unless($method=='delete')


        <!-- Title Form Field -->
        
            <div class="form-group">
        
                {!! Form::label('title','Title :') !!}
                {!! Form::text('title',null,['class'=>'form-control']) !!}
        
            </div>


<!-- Article_type_id Form Field -->

    <div class="form-group">

        {!! Form::label('article_type_id','Article_type_id :') !!}
        {!! Form::select('article_type_id',$type_list,$article->article,['class'=>'form-control']) !!}

    </div>


<!-- Content Form Field -->

    <div class="form-group">

        {!! Form::label('content','Content :') !!}
        {!! Form::textarea('content',$article->content,['class'=>'form-control','onclick'=>'getContent();']) !!}

    </div>


        <script>
            CKEDITOR.replace('content');
            function getContent()
            {
               $("#content").html( CKEDITOR.instances.content.getData());

            }
        </script>

        {!! Form::submit('Save',array('class'=>'btn btn-default','onClick'=>'return  getContent();')) !!}
        @else
            {!! Form::submit('Delete',array('class'=>'btn btn-default')) !!}

        @endif
        {!! Form::close() !!}




@stop