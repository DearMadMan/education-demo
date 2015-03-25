@extends('admin.app')


@section('header')

    <h2>{{$article->title}} </h2>
        <a class="btn btn-primary" href="{{url('admin/article/'.$article->id.'/edit')}}">编辑</a>


    <a class="btn btn-primary" href="@if($is_type){{url('admin/article-type/'.$is_type)}}@else{{url('admin/article')}}@endif">返回</a>

    <h3>分类: {{$article->type->type_name}}</h3>
@stop


@section('content')

<div class="container">

    {!! $article->content !!}


</div>

@stop