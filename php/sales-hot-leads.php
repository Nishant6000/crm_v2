<?php
include('../db/config.php');
$table_name = "leads_db";
if(isset($_GET['data'])){
	$data_2_process = $_GET['data'];
	$data_2_process_out = explode('|', $data_2_process);
	if($data_2_process_out[2] == "4"){
		sales_hot_lead_request_mgr($data_2_process_out[0],$data_2_process_out[1],$data_2_process_out[3]);
		echo "^~";
	}else{
		sales_hot_lead_request($data_2_process_out[0],$data_2_process_out[1],$data_2_process_out[3]);
		echo "^~";
	}
	
}else {
	echo "";
}
?>