$.fn.resizeMenu=function(){
    if($(document).width() >=750)
        $('.own-menu-bar').height($(document).height());
};
$(function(){
    $(':checkbox').iCheck({
        checkboxClass: 'icheckbox_square-grey',
        radioClass: 'iradio_square-grey',
        increaseArea:'20%'
    });
    $("#menu").metisMenu({});
});