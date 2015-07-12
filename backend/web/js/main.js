$(function(){
    $("#menu").metisMenu();
    $("#menu li a").click(function(){
        var ihand = $(this).find("i");
        if(ihand.hasClass("glyphicon-chevron-left"))
            ihand.removeClass("glyphicon-chevron-left").addClass("glyphicon-chevron-down");
        else
            ihand.removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-left");
    });
});