<div class="container-fluid">
    <div id="container3" class="row own-highchart"></div>
</div>
<?php
$this->registerJs("
$('#container3').highcharts({
            chart : {
                type : 'line'
            },
            title : {
                text : '新增与激活'
            },
            subtitle : {
                text : '最高人数：30990'
            },
            xAxis : {
                categories : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis : {
                title : {
                    text : '人数'
                }
            },
            tooltip : {
                enabled : false,
                formatter : function () {
                    return '<b>' + this.series.name + '</b><br>' + this.x + ': ' + this.y + '°C';
                }
            },
            plotOptions : {
                line : {
                    dataLabels : {
                        enabled : true
                    },
                    enableMouseTracking : false
                }
            },
            series : [{
                name : '新增',
                data : [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            }, {
                name : '激活',
                data : [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
            }
            ]
        });
");
?>