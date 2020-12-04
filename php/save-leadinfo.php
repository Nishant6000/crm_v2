<?php
include('../db/config.php');
session_start();
$table_name = "leads_db";
if(isset($_GET['ldname'])){
	$company = $_GET['ldname'];// company name
	$curl = $_GET['ldurl']; // company url
	$firstname = $_GET['lfname']; // first name
	$lastname = $_GET['llname']; // last name
	$designation = $_GET['lpersontitle'];// designation
    $email = $_GET['lemail']; // email	
	$phoneno = $_GET['lphone']; // phone number
	$follow_up = $_GET['lfollowup']; //follow up
	$closed = 0;
	$amount = 0;
			if (isset($_SESSION["optin_user"])){
				$temp = $_SESSION["optin_user"];
				$date = date('Y-m-d'); // date
				$user_name = str_ireplace("optin_","",$temp); //user name
				if(!check_if_lead_exists_sameuser($table_name, $user_name, $email)){
					createleaddb($table_name, $firstname, $lastname, $company, $curl, $email, $designation, $phoneno, $user_name, $follow_up, $closed, $amount, $date);
				}else{
					echo "leads already exists. Please Create New One";
				}
			}else{
				header('location: ../index.php');
			}
	
}else {
	
}
?>