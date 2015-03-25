@extends('admin.app')


@section('header')

    <h2>score_logList</h2>

    <a href="{{url('admin')}}">Back to View</a>
@stop


@section('content')

    @foreach($score_logs as $score_log)
        <p>{{$score_log->user->name}}   ： {{$score_log->summary}} </p>

    @endforeach

    <div class="container">
        {!! $score_logs->render() !!}
    </div>
@stop