$(function(){


});



function is_delete(tables){
    if(confirm('确定要删除所选吗?'))
    {
        var list=getChecked();
        if(list){
            var token=$('#token').val();
            var in_str='';
            list.each(function(i){
                in_str+=$(this).val()+',';
            });

            $.ajax({
               url:'/admin/delete',
                dataType:'text',
                cache:false,
                type:'post',
                data:{in:in_str,_token:token,table:tables},
                success:function(data){

                },
                complete:function(data){
                    //console.log(data.responseText);
                   location.reload();
                }

            });
        }
    }
    return false;
}


function getChecked(){
    var list=$('input[type=checkbox]:checked');
    if(list.length==0){
        alert('选择项为零！');
        return false;
    }
    return list;
}


function pay(obj){
    var o_a=$("#a_"+obj);

    if(confirm('确定要进行打款操作吗?'))
    {
        var ids=o_a.attr('data');
        console.log(ids);
        var token=$("#token").val();
        $.ajax({
            url:'/admin/pay',
            dataType:'text',
            type:'post',
            data:{t_id:ids,_token:token},
            success:function(data){
                o_a.parent().html('<span class="red">已发放</span>');

            },
            complete:function(data){
                console.log(data.responseText);
            }
        });
    }

}