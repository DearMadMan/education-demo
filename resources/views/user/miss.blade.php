@extends('app')

@section('content')
    <link rel="stylesheet" href="{{url('/')}}/css/style.css"/>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">重置密码</div>
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

                            @if(Session::has('tips'))
                                <div class="container nopadding mg-10">
                                    <div class="alert alert-warning no-margin">
                                        <i class="iconfont">&#xe6b6;</i> &nbsp;&nbsp; {{Session::get('tips')}}
                                    </div>
                                </div>
                            @endif


                        <form class="form-horizontal" role="form" method="POST" action="{{url('home/miss')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">



                            <div class="form-group">
                                <label class="col-md-4 control-label">邮箱地址</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">新密码</label>
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

                            <div class="form-group">
                                <label class="col-md-4 control-label">密保</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="repassword">
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
                                        确定
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
