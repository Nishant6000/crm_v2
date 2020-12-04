<?php
include('../db/config.php');
$table_name = "leads_db";
if(isset($_GET['data'])){
	$data_2_process = $_GET['data'];
	$data_2_process_out = explode('|', $data_2_process);
	delete_lead($data_2_process_out[0],$data_2_process_out[1]);
	echo "^~";
}else {
	echo "";
}
?>