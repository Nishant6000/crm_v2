<?php
include('../db/config.php');
$table_name = "pitch_sub";
if(isset($_GET['campain'])){
	$campain = $_GET['campain'];
	$subject = $_GET['sub'];
	$pitch =  $_GET['pitch'];
	session_start();
	if (isset($_SESSION["optin_user"])){
		$temp = $_SESSION["optin_user"];
		$user_name = str_ireplace("optin_","",$temp); //user name
		if(check_pitch_sub($table_name, $user_name, $campain, $subject)){
			echo "^*";
		}else{
			save_pitch_sub($table_name, $user_name, $campain, $subject, $pitch);
			echo "^~";
		}
	}else{
		header("location: ../index.php");
	}
											
	echo "^~";
}else {
	echo "";
}
?>