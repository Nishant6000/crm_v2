<?php
include('../db/config.php');
session_start();
$table_name = "leads_db";
if(isset($_POST['val'])){
	$serial = $_POST['val'];
	$closed = 0;
	$amount = 0;
	
   
			if (isset($_SESSION["optin_user"])){
				$temp = $_SESSION["optin_user"];
				$date = date('Y-m-d'); // date
				$random = rand(10,10000);
				$user_name = str_ireplace("optin_","",$temp); //user name
				if($_FILES['file']['name'] != ''){
   				
				$file_loc = "../optin_db_folder/".$user_name."/samples/".$random.'-'.$_FILES['file']['name'];
			if (!file_exists('../optin_db_folder/'.$user_name.'/samples')) {
				mkdir('../optin_db_folder/'.$user_name.'/samples', 0777, true);
			}
			//=========================
				move_uploaded_file($_FILES['file']['tmp_name'], $file_loc);
				sales_samp_file_loc($serial, $file_loc);
				echo "File Uploaded Sucessfully";
				}else{
					echo "Please upload File";
					die;
				}
				
			}else{
				header('location: ../index.php');
			}
}else {
	ECHO "null Recived";
}
?>