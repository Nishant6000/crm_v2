<?php
include('../db/config.php');
session_start();
$table_name = "leads_db";
if(isset($_POST['leadname'])){
	$leadname = $_POST['leadname'];
	$company =  $_POST['ldname'];
	$curl = $_POST['ldurl'];
	$firstname =  $_POST['lfname'];
	$lastname =  $_POST['llname'];
	$designation =  $_POST['lpersontitle'];
	$email =  $_POST['lemail'];
	$phoneno =  $_POST['lphone'];
	$follow_up = $_POST['lfollowup'];
	$closed = 0;
	$amount = 0;
	
   
			if (isset($_SESSION["optin_user"])){
				$temp = $_SESSION["optin_user"];
				$date = date('Y-m-d'); // date
				$user_name = str_ireplace("optin_","",$temp); //user name
				if($_FILES['file']['name'] != ''){
   				
				$file_loc = "../optin_db_folder/".$user_name."/"."excel-lead-".$_FILES['file']['name'];
			if (!file_exists('../optin_db_folder/'.$user_name)) {
				mkdir('../optin_db_folder/'.$user_name, 0777, true);
			}
			//=========================
				move_uploaded_file($_FILES['file']['tmp_name'], $file_loc);
				}else{
					echo "Please upload File";
					die;
				}
				if(!check_if_lead_exists_sameuser($table_name, $user_name, $email)){
					createleaddb($table_name, $firstname, $lastname, $company, $curl, $email, $designation, $phoneno, $user_name, $follow_up, $closed, $amount, $date, $leadname, $file_loc);
					echo "Lead Uploaded Successfully";
				}else{
					echo "leads already exists. Please Create New One";
				}
			}else{
				header('location: ../index.php');
			}
}else {
	ECHO "null Recived";
}
?>