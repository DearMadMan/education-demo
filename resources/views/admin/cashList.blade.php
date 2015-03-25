@extends('admin.app')


@section('header')
    <script src="{{url('/')}}/js/delete.js"></script>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  <h2>cash</h2>
    <a class="btn btn-primary" href="{{url('admin')}}">返回</a>
  <a class="btn btn-primary" href="javascript:is_delete('cashes');">删除</a>

@stop


@section('content')

        @foreach($cashs as $cash)
            <div class="container mg-10">
            <div class="pull-left"> <input type="checkbox" name="check" value="{{$cash->id}}"/>&nbsp;&nbsp;<a href="{{url('admin/user/').'/'.$cash->user->id}}">用户ID:{{$cash->user->id}}</a>
                &nbsp;  姓名：{{$cash->user->nick_name}}&nbsp;&nbsp;&nbsp;&nbsp;提现：{{$cash->point}} &nbsp;&nbsp; 支付宝：{{$cash->user->alipay}}
            </div>
            <div class="pull-right">
                <span>{{$cash->created_at}}&nbsp;&nbsp;&nbsp;&nbsp;</span>
                @if($cash->is_pay)
                  <span class="red">已发放</span>
                    @else
                    <a id="a_{{$cash->id}}" href="javascript:pay({{$cash->id}});" data="{{$cash->id}}"><span class="green">未发放</span></a>
                    @endif
            </div>
            </div>
        @endforeach

    <div class="container">
        {!! $cashs->render() !!}
    </div>
@stop