<?php
include('../db/config.php');
session_start();
$table_name = "attendance";
$user_name = $_SESSION["optin_user"];
$user_name = str_ireplace("optin_","",$user_name);
$date = date('Y-m-d');
$time = date('h:i');
$checkloginstatus = checkLogin($table_name, $user_name, $date);	
	if($checkloginstatus){
	Logout($table_name, $user_name,$date, $time);
	}else{
		echo "Sorry Unable To Find the user session to Register Login";
	}
session_destroy();
header('location: ../index.php')
?>