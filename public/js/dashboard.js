$(function(){
    $(".user-nav li").each(
        function(){
           $(this).css({
               'height':$(this).outerWidth()+'px',
               'line-height':$(this).outerWidth()+'px'
           });
        }
    );
});