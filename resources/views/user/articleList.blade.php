@extends('user')


@section('header')

    <div class="container nopadding system-message-header">
        <div class="pull-left">
            <a href="{{url('user')}}">
                <i class="iconfont">&#xe650;</i>
            </a>
        </div>
        <div class="pull-right">
            <a href="{{url('user/logout')}}" class="btn btn-link">登出</a>
        </div>
        <h5>{{$article_title}}</h5>
    </div>

@stop




@section('content')
    <div class="container-fluid article-list">
        @foreach($articles as $article)



                <div class="article-title">
                    <a href="{{url('user/article/'.$article->id)}}">  {{$article->title}}</a>
                </div>





        @endforeach
        <div class="container">
            {!! $articles->render() !!}
        </div>
    </div>

@stop