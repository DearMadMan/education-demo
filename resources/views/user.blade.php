<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <title>用户中心 {{$title or ''}}</title>
    <link rel="stylesheet" href="{{url('/')}}/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{url('/')}}/css/style.css?v=1.0"/>
</head>
<body @if(!$config->can_copy)
        onselectstart="return false;"
        @endif
        >
<script src="{{url('/')}}/js/jquery.min.js"></script>
<script src="{{url('/')}}/js/bootstrap.min.js"></script>



    @yield('header')


<div class="container">
    @yield('content')

</div>

@include('user.nav')
</body>
</html>