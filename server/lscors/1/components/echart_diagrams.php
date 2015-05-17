<?php
include 'echart_public.php';

function diagram_bar(
		$dom, $title, 
		$category_name, $categories, 
		$value_name, $values){
	echart_start();
	echo "
	require(
		['echarts','echarts/chart/bar'],
		function(ec){
			var myChart = ec.init(document.getElementById(".$dom."));
			var option = {
				tooltip:{
					show: true
				},
				legend:{
					data:[".$title."]
				},
				xAxis:[{
					type: ".$category.",
					data: [".$categories."]
				}],
				yAxis:[{
					type: ".$value_name."
				}],
				series:[{
					\"name\": ".$title.",
					\"type\": \"bar\",
					\"data\": ".$values."
				}]
			};
			myChart.setOption(option);
		}
	);";
	echart_end();
}

function diagram_pie(
		$dom, $title, 
		$categories, $values){
	echart_start();
	
	echo "
	require(
		['echarts','echarts/chart/pie'],
		function(ec){
			var myChart = ec.init(document.getElementById(".$dom."));
			var option = {
				title:{
					text:".$title.",
					x:'center'
				},
				tooltip:{
					triger:'item',
					formatter:\"{a}<br/>{b}:{c}({d}%)\",
					show: true
				},
				legend:{
					orient:'vertical',
					x:'left',
					data:[".$categories."]
				},
				toolbox:{
					show:true,
					feature:{
						mark:{show:true},
						dataView:{show:true,readOnly:false},
						magicType:{
							show:true,
							type:['pie','funnel'],
							option:{
								funnel:{
									x:'25%',
									width:'50%',
									funnelAlign:'left'
								}
							}
						},
						restore:{show:true},
						saveAsImage:{show:true}
					}
				},
				calculable:true,
				series:[{
					name: ".$title.",
					type: 'bar',
					radius:'60%',
					center:['50%','60%'];
					data: ["
						.$values.
					"]
				}]
			};
			myChart.setOption(option);
		}
	);";
	echart_end();
}