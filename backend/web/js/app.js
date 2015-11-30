/**
 * Created by xuguoliang on 2015/11/22.
 */
$(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        var curr = e.target;
        var prev = e.relatedTarget;
        var li = $(this).parent();
        var index = li.index();
        var tab_content = li.parent().siblings('.tab-content');
        var tab_pane    = tab_content.children('.tab-pane').eq(index);
        var chart_div   = tab_pane.children().find(".own-highchart");
        var highctart = chart_div.highcharts();
        if(highctart != undefined) {
            highctart.destroy();
        }
        //触发一个重绘事件
        chart_div.trigger('own.redraw.chart');
    });
});