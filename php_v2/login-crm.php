<?php
include('../db_v2/config.php');
$table_name = 'crm_auth';
date_default_timezone_set('America/Chicago');
if (isset($_POST["submit"])) {
	$user_name = $_POST["username"];
	$password = $_POST["password"];
	$login_auth_val = getAuth($table_name, $user_name, $password);
	if($login_auth_val){
		// set session and redirect to dashboard
		session_start();
		$_SESSION["optin_user"] = "optin_".$user_name;
		$_SESSION["access_level"] = $login_auth_val['access'];
		$date = date('Y-m-d');
		$time = date('h:i:s');
		$checkloginstatus = checkLogin($table_name_2, $user_name, $date);	
		if(!$checkloginstatus){
		 storeLogin($table_name_2, $user_name, $date, $time);
		}
		header('location: ../dash_board_v2.php');
	}else{
		header('location: ../index.php?msg=Invalid Password');
	}
}

?>