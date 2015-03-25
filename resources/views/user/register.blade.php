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
        <h5>会员注册</h5>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">注册</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>提示!</strong> 这里有一些输入错误.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{url('user/register')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">代理微信</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">邮箱地址</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">用户密码</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">密码效验</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-4 control-label">密保</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<input type="password" class="form-control" name="repassword">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-4 control-label">密保效验</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<input type="password" class="form-control" name="repassword_confirmation">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        注册
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
