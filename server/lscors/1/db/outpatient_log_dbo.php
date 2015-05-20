<?php
include 'db_operator.php';
$user = SAE_MYSQL_USER;
$psd = SAE_MYSQL_PASS;
$host = SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT;

define("INDEX_PATIENT_GENDER", 4);
define("INDEX_PATIENT_AGE", 5);
define("INDEX_DIAGNOSIS", 10);
define("INDEX_RECEPTION", 11);
define("INDEX_REGISTRATION", 12);
define("INDEX_WAIT", 13);
define("INDEX_DOCTOR", 14);
define("INDEX_CONSULTATION", 17);
define("POPULATION_TREND", 33);

define("TOTAL_COUNT", get_total_count());

function get_total_count(){
	$sql = "select count(*) from outpatient_log";
	$t_count = get_common_query($sql);
	if($t_count == NULL){
		$mysql = new SaeMysql();
		$data = $mysql->getLine($sql);
		$t_count = $data["count(*)"];
	}
	echo $t_count;
	$mysql->closeDb();
	set_common_query($sql, $t_count);
	return $t_count;
}

function get_first_date(){
	$mysql = new SaeMysql();
	$sql = "select min(registration_time) from outpatient_log";
	$data = $mysql->getLine($sql);
	echo $data["min(registration_time)"];
	$mysql->closeDb();
	return $data["min(registration_time)"];
}

function get_last_date(){
	$mysql = new SaeMysql();
	$sql = "select max(registration_time) from outpatient_log";
	$data = $mysql->getLine($sql);
	echo $data["max(registration_time)"];
	$mysql->closeDb();
	return $data["max(registration_time)"];
}

function get_attribute_description($index){

	$mysql = new SaeMysql();
	$sql = "";
	$data = NULL;

	switch($index){
		#get count for genders
		case INDEX_PATIENT_GENDER:
			$gender = array("male"=>0,"female"=>0);
			$sql = "select count(*) from outpatient_log where patient_gender = '男'";
			$data = $mysql->getLine($sql);
			$gender['male'] = $data["count(*)"];
			$sql = "select count(*) from outpatient_log where patient_gender = '女'";
			$data = $mysql->getLine($sql);
			$gender['female'] = $data["count(*)"];
			$mysql->closeDb();
			return $gender;
		#get count for different age ranges
		case INDEX_PATIENT_AGE:
			$age = array("10s"=>0,"20s"=>0,"30s"=>0,"40s"=>0,"50s"=>0,"60s"=>0,"70s"=>0,"else"=>0);
			for($i = 0 ; $i < 7 ; $i ++){
				$sql = "select count(*) from outpatient_log where patient_age > "
						.($i * 10).
						" and patient_age < "
						.(($i + 1) * 10);
				$data = $mysql->getLine($sql);
				$age["".(($i + 1) * 10)."s"] = $data["count(*)"];
			}
			$sql = "select count(*) from outpatient_log where patient_age > 70";
			$data = $mysql->getLine($sql);
			$age["else"] = $data["count(*)"];
			$mysql->closeDb();
			return $age;
		#generate diagnosis with count
		case INDEX_DIAGNOSIS:
			$diagnosis = array();
			#obtain 10000 data at a time
			for($i = 0 ; $i < TOTAL_COUNT ; $i += 10000){
				$sql = "select (diagnosis) from outpatient_log limit "
						.$i.",".($i + 10000);
				$data = $mysql->getData($sql);
				#for each data generate its diagnosis and their count
				foreach ($data as $ele_id => $element) {
					$key = $element["diagnosis"];
					#get all diagnosis of a transaction
					$newKeyList = keyGeneralization(INDEX_DIAGNOSIS,$key);
					#for each diagnosis add its count
					foreach ($newKeyList as $dgn => $value) {
						if($value == NULL || $value == "" || $value =="null"){
							continue;
						}
						$count = 0;
						if($diagnosis[$value] != null)
							$count = $diagnosis[$value];
						$diagnosis[$value] = ($count + 1);
					}
				}
			}
			arsort($diagnosis);
			$filtered_diagnosis = array();
			$filter_index = 0;
			$else_count = 0;
			foreach($diagnosis as $dg_key => $dg_value){
				if($filter_index >= 10){
					$else_count += $dg_value;
				}else{
					$filtered_diagnosis[$dg_key] = $dg_value;
					$filter_index ++;
				}
			}
			$filtered_diagnosis["其他"] = $else_count;
			$mysql->closeDb();
			return $filtered_diagnosis;
		case INDEX_REGISTRATION:
		case INDEX_RECEPTION:
		case INDEX_DOCTOR:
			$doctor = array();
			for($i = 0 ; $i < TOTAL_COUNT ; $i += 10000){
				$sql = "select (doctor_name) from outpatient_log limit "
						.$i.",".($i + 10000);
				$data = $mysql->getData($sql);
				#for each data generate its diagnosis and their count
				foreach ($data as $ele_id => $ele_value) {
					$dct = $ele_value["doctor_name"];
					$count = 0;
					if($doctor[$dct] != null)
						$count = $doctor[$dct];
					$doctor[$dct] = ($count + 1);
				}
			}
			arsort($doctor);
			return $doctor;
		case INDEX_WAIT:
			$wait = array();
			for($i = 0 ; $i < 6 ; $i ++){
				$sql = "select count(*) from outpatient_log where waiting_time > "
						.($i * 30).
						" and waiting_time < "
						.(($i + 1) * 30);
				$data = $mysql->getLine($sql);
				$wait["".($i * 0.5)."h-".(($i + 1) * 0.5)."h"] = $data["count(*)"];
			}
			$sql = "select count(*) from outpatient_log where waiting_time > 180";
			$data = $mysql->getLine($sql);
			$wait[">3h"] = $data["count(*)"];
			$mysql->closeDb();
			return $wait;
		case INDEX_CONSULTATION:
			$consultation = array();
			$sql = "select count(*) from outpatient_log where further_consultation = 'Y'";
			$data = $mysql->getLine($sql);
			$cst = $data["count(*)"];
			$sql = "select count(*) from outpatient_log where diagnosis = 'null'";
			$data = $mysql->getLine($sql);
			$dg = TOTAL_COUNT - $data["count(*)"];
			$consultation["复诊"] = $cst;
			$consultation["确诊"] = $dg;
			$consultation["总计"] = TOTAL_COUNT;
			return $consultation;
		case POPULATION_TREND:
			$trend = array();
			$f_year = 2010;
			$f_month = 12;
			$l_year = 2013;
			$l_month = 12;
			for($y = $f_year ; $y <= $l_year ; $y ++){
				for($m = 1 ; $m <= 12 ; $m ++){
					$start_time = get_start_time_of_month($y, $m);
					$end_time = get_end_time_of_month($y, $m);
					$sql = "select count(*) from outpatient_log where registration_time > \""
						.$start_time."\" and registration_time < \"".$end_time."\"";
					$data = $mysql->getLine($sql);
					if(m == 1){
						$trend["".$y."年"] = $data["count(*)"];
					}else{
						$trend["".$y."年".$m."月"] = $data["count(*)"];
					}

					if($m == $l_month && $y == $l_year) break;
				}
			}
			return $trend;
		default:break;
	}
}

/**
*	generalize a key
*/
function keyGeneralization($index, $oldKey){
	$newKeys = NULL;
	switch ($index) {
		case INDEX_DIAGNOSIS:
			$newKeys = explode(",",$oldKey);
			break;
		default:
			break;
	}
	return $newKeys;
}
/**
*	get the earliest time of a month
*/
function get_start_time_of_month($year, $month){
	$time = mktime(0,0,0,$month,1,$year);
	return date("Y-m-d h:i:s", $time);
}
/**
*	get the earliest time of next month
*/
function get_end_time_of_month($year, $month){
	if($month == 12){
		$year ++;
		$month = 1;
	}else{
		$month ++;
	}
	$time = mktime(0,0,0,$month,1,$year);
	return date("Y-m-d h:i:s", $time);
}
?>