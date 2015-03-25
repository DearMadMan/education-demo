@extends('admin.app')

@section('header')

    <h2>配置信息</h2>
    <a class="btn btn-primary" href="{{url('admin/')}}">返回</a>
    <?php $tips=$errors->all(); ?>
    @foreach($tips as $k=>$e)

        <p> <span class="red">:(</span>  {{ $e }} </p>

    @endforeach
@stop


@section('content')


   {!!Form::open(['url'=>'admin/config','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}
   <div class="form-group">
       <div class="col-xs-4">
           <input id="fileupload" type="file" name="file"  >
       </div>
        <div class="col-xs-8"><span id="img_url"></span></div>
   </div>

   <div class="form-group">
   <div id="progress">
       <div class="bar" style="width: 0%;"></div>
   </div>
   </div>


   <!-- Pic_1 Form Field -->
   
       <div class="form-group">
   
           {!! Form::label('pic_1','图一 :',['class'=>'col-xs-3 control-label']) !!}
           <div class="col-xs-7">
           {!! Form::text('pic_1',$config->pic_1,['class'=>'form-control','placeholder'=>'登录页图片地址']) !!}
           </div>
           <div class="col-xs-2">
               <button class="btn btn-primary" type="button" onclick="uploadSome('pic_1');return false;">修改</button>
           </div>
       </div>


   <!-- Pic_1_a Form Field -->

       <div class="form-group">

           {!! Form::label('pic_1_a','链接 :',['class'=>'col-xs-3 control-label']) !!}
           <div class="col-xs-9">
           {!! Form::text('pic_1_a',$config->pic_1_a ,['class'=>'form-control']) !!}
           </div>
       </div>



   
   <!-- Pic_2 Form Field -->
   
       <div class="form-group">
   
           {!! Form::label('pic_2','图二 :',['class'=>'col-xs-3 control-label']) !!}
           <div class="col-xs-7">
           {!! Form::text('pic_2',$config->pic_2,['class'=>'form-control','placeholder'=>'用户页图片地址一']) !!}
           </div>
           <div class="col-xs-2">
               <button class="btn btn-primary" type="button" onclick="uploadSome('pic_2');return false;">修改</button>
           </div>
       </div>

   <!-- Pic_2_a Form Field -->

       <div class="form-group">

           {!! Form::label('pic_2_a','链接 :',['class'=>'col-xs-3 control-label']) !!}
           <div class="col-xs-9">
           {!! Form::text('pic_2_a',$config->pic_2_a,['class'=>'form-control']) !!}
           </div>
       </div>


   <!-- Pic_3 Form Field -->
   
       <div class="form-group">
   
           {!! Form::label('pic_3','图三 :',['class'=>'col-xs-3 control-label']) !!}
           <div class="col-xs-7">
           {!! Form::text('pic_3',$config->pic_3,['class'=>'form-control','placeholder'=>'用户页图片地址二']) !!}
           </div>
           <div class="col-xs-2">
               <button class="btn btn-primary" type="button" onclick="uploadSome('pic_3');return false;">修改</button>
           </div>
       </div>

   <!-- Pic_3_a Form Field -->

       <div class="form-group">

           {!! Form::label('pic_3_a','链接 :',['class'=>'col-xs-3 control-label']) !!}
           <div class="col-xs-9">
           {!! Form::text('pic_3_a',$config->pic_3_a,['class'=>'form-control']) !!}
           </div>
       </div>

   <!-- Pic_4 Form Field -->
   
       <div class="form-group">
   
           {!! Form::label('pic_4','图四 :',['class'=>'col-xs-3 control-label']) !!}
           <div class="col-xs-7">
           {!! Form::text('pic_4',$config->pic_4,['class'=>'form-control','placeholder'=>'用户页图片地址三']) !!}
           </div>
           <div class="col-xs-2">
               <button class="btn btn-primary" type="button"  onclick="uploadSome('pic_4');return false;">修改</button>
           </div>
       </div>

   <!-- Pic_4_a Form Field -->

       <div class="form-group">

           {!! Form::label('pic_4_a','链接 :',['class'=>'col-xs-3 control-label']) !!}
           <div class="col-xs-9">
           {!! Form::text('pic_4_a',$config->pic_4_a,['class'=>'form-control']) !!}
           </div>
       </div>


   <!-- Can_copy Form Field -->

       <div class="form-group">

           {!! Form::label('can_copy','禁止复制 :',['class'=>'col-xs-3 control-label']) !!}
           <div class="col-xs-9">
           {!! Form::text('can_copy',$config->can_copy,['class'=>'form-control','placeholder'=>'为空即允许']) !!}
           </div>
       </div>
   
   <!-- Can_open Form Field -->
   
       <div class="form-group">
   
           {!! Form::label('can_open','禁止PC :',['class'=>'col-xs-3 control-label']) !!}
           <div class="col-xs-9">
           {!! Form::text('can_open',$config->can_open,['class'=>'form-control','placeholder'=>'为空即允许']) !!}
           </div>
       </div>
   
        {!! Form::submit('更新配置',array('class'=>'form-control btn btn-primary')) !!}

        {!! Form::close() !!}
   <script src="{{url('/')}}/js/jquery.ui.widget.js"></script>
   <script src="{{url('/')}}/js/jquery.iframe-transport.js"></script>
   <script src="{{url('/')}}/js/jquery.fileupload.js"></script>

   <script>
       $(function() {
           $("#fileupload").fileupload({
               url: '/admin/upload',
               sequentialUploads: true
           }).bind('fileuploadprogress', function (e, data) {
               var progress = parseInt(data.loaded / data.total * 100, 10);
               $('#progress .bar').css(
                       'width',
                       progress + '%'
               );
           }).bind('fileuploaddone', function (e, data) {
                $("#img_url").text(data.result);
           });

       });


       function uploadSome(obj){
            $('#'+obj).val($("#img_url").text());
       }
   </script>

@stop