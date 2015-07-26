$.fn.resizeMenu=function(){
    if($(document).width() >=750)
        $('.own-menu-bar').height($(document).height());
};
$(function(){
    //var self = this;
    //$("#menu").resizeMenu();
    //$(window).resize(function(){
    //    if($(document).width() >=750)
    //        $("#menu").resizeMenu();
    //    else
    //        $('.own-menu-bar').height('');
    //});
    $("#menu").metisMenu({
        
    });
});