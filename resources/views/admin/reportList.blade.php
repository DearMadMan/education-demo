@extends('admin.app')


@section('header')
    <script src="{{url('/')}}/js/delete.js"></script>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <h2>举报列表</h2>

    <a class="btn btn-primary" href="{{url('admin/report/create')}}"><span>新建</span></a>
    <a class="btn btn-primary" href="{{url('admin')}}">返回</a>
    <a class="btn btn-primary" href="javascript:is_delete('reports');">删除</a>
@stop


@section('content')

        @foreach($reports as $report)
            <div class="container mg-10">
                <div class="pull-left">
                <input type="checkbox" name="check" value="{{$report->id}}"/>&nbsp;&nbsp; <a href="{{url('admin/user/').'/'.$report->user_id}}">用户ID:{{$report->user_id}}</a> &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{url('admin/report/'.$report->id)}}">    Report：    <span>{{$report->wechat}} </span>
                </a></div>
            <div class="pull-right">
                <span>{{$report->created_at}} </span>&nbsp;&nbsp;
                @if($report->reply!='')
                    <span class="red">已回复</span>
                    @else
                    <span class="green">未回复</span>
                @endif

            </div>
            </div>
        @endforeach

    <div class="container">
        {!! $reports->render() !!}
    </div>
@stop