<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <title>管理中心</title>
    <link rel="stylesheet" href="{{url('/')}}/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{url('/')}}/css/style.css"/>
    <script src="{{url('/')}}/js/jquery.min.js"></script>
    <script src="{{url('/')}}/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/js/admin.js"></script>
</head>
<body style="">
@include('admin.nav')

<div class="container">
    <div class="page-header">
        @yield('header')
    </div>
    @if(Session::has('tips'))
        <div class="alert alert-success">
            {{Session::get('tips')}}
        </div>
    @endif
    @yield('content')
    </div>
<script src="{{url('/')}}/js/dashboard.js"></script>
</body>
</html>