<?php
include('../db/config.php');
$table_name = "leads_db";
if(isset($_GET['data'])){
	$data_2_process = $_GET['data'];
	$data_2_process_out = explode('|', $data_2_process);
	if($data_2_process_out[2] == "4"){
		sales_redsceh_followup_mgr($data_2_process_out[0],$data_2_process_out[1],$data_2_process_out[3],$data_2_process_out[4]);
		echo "^~";
	}else if($data_2_process_out[2] == "3"){
		sales_redsceh_followup_sales($data_2_process_out[0],$data_2_process_out[1],$data_2_process_out[3],$data_2_process_out[4]);
		echo "^~";
	}else{
		sales_redsceh_followup($data_2_process_out[0],$data_2_process_out[1],$data_2_process_out[3],$data_2_process_out[4]);
		echo "^~";
	}
	
}else {
	echo "";
}
?>