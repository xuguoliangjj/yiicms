/**
 * Created by xuguoliang on 2015/11/23.
 */
$(function(){
    $(".own-panel .nav-pills > li").bind('click',function(){
        var index = $(this).index();
        var tag_content = $(this).parent().siblings('.tab-content').children().eq(index);
        tag_content.remove();
    });
});