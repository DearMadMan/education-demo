@extends('user')


@section('header')

    <div class="container nopadding system-message-header">
        <div class="pull-left">
            <a href="{{redirect()->back()->getTargetUrl()}}">
                <i class="iconfont">&#xe650;</i>
            </a>
        </div>
        <div class="pull-right">
            <a href="{{url('user/logout')}}" class="btn btn-link">登出</a>
        </div>
        <h5>{{$article->type->type_name}}</h5>
    </div>

@stop




@section('content')
    <div class="container-fluid article-list">



            <div class="container article-body">
                <div class="page-header mg-10">
                    {{$article->title}}
                </div>
               {!!$article->content!!}
            </div>







    </div>

@stop