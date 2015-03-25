    <nav class="navbar my-nav  navbar-fixed-bottom">
        <div class="container-fluid">
            <ul class="nav navbar-nav my-nav text-center">
                <li class="active"><a href="{{url('user')}}"><i class="iconfont">&#x3469;</i><span>会员中心</span></a></li>
                <li class="active"><a href="{{url('user/system-message')}}#"><i class="iconfont">&#xe62e;</i><span>站内信息</span></a></li>
                <li class="active" data-toggle="modal" data-target="#myModal" ><a href="javascript:;"><i class="iconfont">&#xe607;</i><span>联系管理</span></a></li>
            </ul>
        </div>
    </nav>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">联系管理：</h4>
                </div>
                <div class="modal-body">

                    <p>QQ :{{$admin->qq}}</p>
                    <p>微信 :{{$admin->wechat}}</p>
                    <p>电话 :{{$admin->phone}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>