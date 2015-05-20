<?php

function draw_statistics_gender($dom){
	$genders = get_attribute_description(INDEX_PATIENT_GENDER);
	diagram_pie(
		$dom,
		"性别比例","",
		"'男','女'",
		"{value:".$genders['male'].",name:'男'},{value:".$genders['female'].",name:'女'}");
}

function draw_statistics_age($dom){
	$ages = get_attribute_description(INDEX_PATIENT_AGE);
	$values = "".$ages["10s"].",".$ages["20s"].","
	.$ages["30s"].",".$ages["40s"].","
	.$ages["50s"].",".$ages["60s"].","
	.$ages["70s"].",".$ages["else"];
	diagram_bar(
		$dom,"年龄分布","",
		"年龄","'<10','10-20','20-30','30-40','40-50','50-60','60-70','>70'",
		"人数",$values);
}

function draw_statistics_diagnosis($dom){
	$diagnosis = get_attribute_description(INDEX_DIAGNOSIS);
	$keys = getKeys($diagnosis);
	$values = getValues($diagnosis);
	diagram_bar(
		$dom,"病症分布","",
		"病症",$keys,
		"人数",$values);
}

function draw_statistics_wait($dom){
	$wt = get_attribute_description(INDEX_WAIT);
	$keys = getKeys($wt);
	$values = getValues($wt);
	diagram_bar($dom,"等待时间分布","",
		"时长",$keys,
		"人数",$values);
}

function draw_statistics_trend($dom){
	$trend = get_attribute_description(POPULATION_TREND);
	$keys = getKeys($trend);
	$values = getValues($trend);
	diagram_line($dom,"看病人数变化","",
		"时间",$keys,
		"人数",$values);
}

function draw_statistics_doctor($dom){
	$doctors = get_attribute_description(INDEX_DOCTOR);
	$keys = getKeys($doctors);
	$values = getValues($doctors);
	diagram_horizontal_bar($dom,"医生接诊量","",
		"医生",$keys,
		"人数",$values);
}

function draw_statistics_consultation($dom){
	$consultation = get_attribute_description(INDEX_CONSULTATION);
	$cst = $consultation["复诊"];
	$dg = $consultation["确诊"];
	$total = $consultation["总计"];
	diagram_pie($dom,
		"复诊率与非复诊确诊率","",
		"'复诊','非复诊确诊','无诊断'",
		"{value:".$cst.",name: '复诊'},{value:"
		.($dg - $cst).",name: '非复诊确诊'},{value:"
		.($total - $dg).",name: '无诊断'}");
}

// function draw_statistics_confirm_diagnosis($dom){
// 	$consultation = get_attribute_description(INDEX_CONSULTATION);
// 	$cst = $consultation["复诊"];
// 	$dg = $consultation["确诊"];
// 	$total = $consultation["总计"];
// 	diagram_pie($dom,
// 		"新增确诊率","",
// 		"'确诊','无诊断'",
// 		"{value:".($dg - $cst).",name:'确诊'},{value:".($total - $dg).",name:'无诊断'}");
// }

function getKeys($elements){
	$keys = "";
	$key_index = 0;
	foreach($elements as $x=>$x_value){
		$keys .= ("'".$x."'");
		$key_index ++;
		if($key_index < count($elements)){
			$keys .= ",";
		}
	}
	return $keys;
}

function getValues($elements){
	$values = "";
	$value_index = 0;
	foreach($elements as $x=>$x_value){
		$values .= ("".$x_value);
		$value_index ++;
		if($value_index < count($elements)){
			$values .= ",";
		}
	}
	return $values;
}
?>