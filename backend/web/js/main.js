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

    $(".nav-pills").on("shown.bs.tab",function(){
        var index = $(this).index();

        $(".tab-content .tab-pane.active").find(".own-highchart").highcharts().reflow();

    });
});