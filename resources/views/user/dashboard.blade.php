@extends('user')

@section('header')
    <link rel="stylesheet" href="{{url('/')}}/css/swiper.min.css"/>
    <script src="{{url('/')}}/js/swiper.jquery.min.js"></script>

    <div class="container mg-b-10 no-padding">


        <!-- Slider main container -->
        <div class="swiper-container ">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide"><a href="{{$config->pic_2_a}}"><img class="img-responsive " src="{{url('/').'/'.$config->pic_2}}" alt="responsive image"/></a></div>
                <div class="swiper-slide"><a href="{{$config->pic_3_a}}"><img class="img-responsive " src="{{url('/').'/'.$config->pic_3}}" alt="responsive image"/></a></div>
                <div class="swiper-slide"><a href="{{$config->pic_4_a}}"><img class="img-responsive " src="{{url('/').'/'.$config->pic_4}}" alt="responsive image"/></a></div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev swiper-button-white"></div>
            <div class="swiper-button-next swiper-button-white"></div>

            <!-- If we need scrollbar -->
            {{--<div class="swiper-scrollbar"></div>--}}
        </div>




        @if(Session::has('tips'))
            <div class="container nopadding mg-10">
            <div class="alert alert-warning no-margin">
                <i class="iconfont">&#xe6b6;</i> &nbsp;&nbsp; {!!Session::get('tips')!!}
            </div>
            </div>
        @endif
    </div>

    @stop
@section('content')


<div class="container-fluid ">
    <ul class="user-nav">
        <li class="dashboard-color9">
            @if($user->msg_number<$msg_number)
                <span class="tip"></span>
            @endif
            <a href="{{url('user/system-message')}}">

                <i class="iconfont">&#xe62e;</i>
               <p>站内信息</p>
            </a>
        </li>
        <li class="dashboard-color2" ><a href="{{url('user/myfile')}}">
                <i class="iconfont">&#xe635;</i>
                <p>我的资料</p>
            </a></li>
        <li class="dashboard-color3">
            <a href="{{url('user/publish')}}">
                <i class="iconfont">&#xe627;</i>
                <p>内部公告</p>
            </a>
        </li>
        <li class="dashboard-color4">
            <a href="{{url('user/message')}}">
                <i class="iconfont">&#xf02a4;</i>
                <p>代理分享</p>
            </a>
        </li>
        <li class="dashboard-color7">
            <a href="{{url('user/score')}}">
                <i class="iconfont">&#xf029c;</i>
                <p>积分提现</p>
            </a>
        </li>
        <li class="dashboard-color6">
            <a href="{{url('user/low')}}">
                <i class="iconfont">&#xf0054;</i>
                <p>初级专区</p>
            </a>
        </li>
        <li class="dashboard-color1">
            <a href="{{url('user/high')}}">
                <i class="iconfont">&#x3452;</i>
                <p>高级专区</p>
            </a>
        </li>
        <li class="dashboard-color8">
            <a href="{{url('user/report')}}">
                <i class="iconfont">&#xf02a3;</i>
                <p>举报专区</p>
            </a>
        </li>
        <li class="dashboard-color5">
            <a href="{{url('user/register')}}">
                <i class="iconfont">&#xf00d8;</i>
                <p>会员注册</p>
            </a>
        </li>
    </ul>
</div>
<script src="../js/dashboard.js"></script>
@stop