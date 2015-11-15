<div id="container4" class="own-highchart"></div>

<?php
$this->registerJs("
$('#container4').highcharts({
	chart : {
		type : 'column'
	},
	title : {
		text : '玩家转化率'
	},
	subtitle : {
		text : '最高：80%'
	},
	xAxis : {
		categories : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
	},
	yAxis : {
		min : 0,
		title : {
			text : '人数'
		}
	},
	tooltip : {
		headerFormat : '<span style=\"font-size:10px\">{point.key}</span>',
		pointFormat : '' + '',
		footerFormat : '<table><tbody><tr><td style=\"color:{series.color};padding:0\">{series.name}: </td><td style=\"padding:0\"><b>{point.y:.1f} mm</b></td></tr></tbody></table>',
		shared : true,
		useHTML : true
	},
	plotOptions : {
		column : {
			pointPadding : 0.2,
			borderWidth : 0
		}
	},
	series : [{
			name : '测试1',
			data : [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
		}, {
			name : '测试2',
			data : [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
		}, {
			name : '测试3',
			data : [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]
		}, {
			name : '测试4',
			data : [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
		}
	]
});
");
?>