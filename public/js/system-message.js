$(function(){
    $(".close").each(function(){

        $(this).bind('click',function(){
            if(!confirm('确定要删除该条信息吗?'))
            {
                return false;
            }
            var msg_id=$(this).attr('data');
            var token=$('#token').val();
            $.ajax({
                url:'/user/delete',
                type:'post',
                dataType:'text',
                data:{_token:token,message_id:msg_id},
                success:function(data){
                    //console.log(data);
                   location.reload();
                }
            });
        });

    });


});