<?php
include('../db/config.php');
session_start();
$table_name = "crm_auth";
if(isset($_GET['sl'])){
	$sl = $_GET['sl'];
	$user = $_GET['uname'];// company name uname="+uname+"&pass1="+pass1+"&access="+access+"&status="+status+"&associate="+associate
	$pass = $_GET['pass1']; // company url
	$access = $_GET['access']; // first name
	$status = $_GET['status']; // last name
	$designation = $access;
	$associate = $_GET['associate'];// designation
	
	if($access == "ADMIN"){
		$access2 = "1";
	}else if($access == "AGENT"){
		$access2 = "2";
	}else{
		$access2 = "3";
	}
	if($status == "DEACTIVE"){
		$status = "0";
	}else{
		$status = "1";
	}
	$pass = base64_encode($pass);
			if (isset($_SESSION["optin_user"])){
				if(check_if_user_exists2($sl)){
					edituserdb($sl, $user, $pass, $access2, $status, $designation, $associate);
					echo "User Modified Successfully";
				}else{
					echo "User Name Does Not Exists. Please Try Another";
				}
			}else{
				header('location: ../index.php');
			}
	
}else {
	
}
?>