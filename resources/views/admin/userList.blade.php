@extends('admin.app')


@section('header')
    <script src="{{url('/')}}/js/delete.js"></script>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<h2>用户列表</h2>

<hr/>

<div class="container">
    <div class="pull-left">
        <a class="btn btn-primary" href="{{url('admin/user/create')}}"><span>新建</span></a>
        <a class="btn btn-primary" href="{{url('admin')}}">返回</a>
        <a class="btn btn-primary" href="javascript:is_delete('users');">删除</a>

    </div>
    <div class="pull-right">

        {!!Form::open(['url'=>'admin/user-search','method'=>'post','class'=>'form-inline'])!!}

        <!-- Search Form Field -->

        <div class="form-group">

            {!! Form::label('search','搜索 :') !!}
            {!! Form::text('search',null,['class'=>'form-control']) !!}
            <div class="btn btn-primary" onclick="$('form').submit()">Search</div>
        </div>

        {!!form::close()!!}
    </div>
</div>
    @stop


@section('content')

    @foreach($users as $user)
        <div class="container mg-10">
            <div class="pull-left">
                <input type="checkbox" name="check" value="{{$user->id}}"/>&nbsp;&nbsp;&nbsp;&nbsp;ID:{{$user->id}}&nbsp;&nbsp;
                <a href="{{url('admin/user/'.$user->id)}}"><span>{{$user->name}} </span></a> &nbsp;&nbsp; {{$user->type->type_name}}&nbsp;&nbsp;积分：{{$user->score}}

            </div>
            <div class="pull-right">

                @if(!empty($user->parent_id))
                    <a href="{{url('admin/user/').'/'.$user->parent_id}}">推荐人ID：{{$user->parent_id}}</a>&nbsp;&nbsp;&nbsp;&nbsp;
                @endif
                {{$user->created_at}}

            </div>
        </div>


    @endforeach
    <div class="container">
        {!! $users->render() !!}
    </div>
    @stop