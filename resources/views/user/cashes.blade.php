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
        <h5>积分提现</h5>
    </div>


    @if(Session::has('tips'))
        <div class="container nopadding">
            <div class="alert alert-success">
                <i class="iconfont">&#xe6b1;</i>
                {{Session::get('tips')}}

            </div>
        </div>
    @endif

@stop

@section('content')

    <div class="container mg-10">
        <p>当前积分：<span style="color:red;">{{$user->score}}</span></p>
    </div>
    <div class="container-fluid article-list">
        @foreach($cashes as $cash)



            <div class="article-title">
             提现: <span class="red">{{$cash->point}}</span> &nbsp;&nbsp; {{$cash->created_at}}&nbsp;&nbsp;
                @if($cash->is_pay==1)
                    <span class="red">已发放</span>
                    @else
                    <span class="green">处理中</span>
                @endif
            </div>





        @endforeach
        <div class="container">
            {!! $cashes->render() !!}
        </div>
    </div>



    <div class="container myfile mg-10">
        <div class="mg-10"></div>
        {!!Form::open(['url'=>'user/score','method'=>'post','class'=>'form-horizontal'])!!}

    <!-- Point Form Field -->
    
        <div class="form-group">
    
            {!! Form::label('point','提现 :',['class'=>'col-xs-3 control-label']) !!}
            <div class="col-xs-9">
            {!! Form::text('point',0,['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="text-center">
                {!! Form::submit('提交',array('class'=>'btn btn-default')) !!}
            </div>

        </div>



        {!!form::close()!!}


    </div>





@stop