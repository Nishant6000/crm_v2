<?php
include_once '../db/config.php';
$table_name = "crm_auth";
if(isset($_GET['search'])){
	$input =  $_GET['search'];
	$search = search_match($table_name, $input);
	
	if($search){
		echo $html = $search[0]['sl_no']."|".$search[0]['username']."|".base64_decode($search[0]['password']);
	}else{
		echo 0;
	}
	
}
?>