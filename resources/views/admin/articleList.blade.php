@extends('admin.app')


@section('header')
    <script src="{{url('/')}}/js/delete.js"></script>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

    @if($types)
        <h2>{{$types->type_name}}</h2>

    @else
    <h2>文章列表</h2>
    @endif
    <a class="btn btn-primary" href="{{url('admin/article/create')}}"><span>新建</span></a>
    <a class="btn btn-primary" href="{{url('admin')}}">返回</a>
    <a class="btn btn-primary" href="javascript:is_delete('articles');">删除</a>
@stop


@section('content')
<div class="container">
    @foreach($articles as $article)
        <div class="container mg-10">
        <div class="pull-left">
            <input type="checkbox" name="check" value="{{$article->id}}"/>&nbsp;&nbsp;
            <a href="{{url('admin/article/'.$article->id)}}"><span>{{$article->title}} </span></a>
        </div>
        <div class="pull-right">
            <span>{{$article->type->type_name}}</span>
        </div>
        </div>
    @endforeach
</div>
    <div class="container">
        {!! $articles->render() !!}
    </div>
@stop