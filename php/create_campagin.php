

<?php
include('../db/config.php');
session_start();
$table_name = "campaign";
if (isset($_SESSION["optin_user"])){
	$temp = $_SESSION["optin_user"];
	date_default_timezone_set('America/Chicago');
	$date = date('Y-m-d');
	$line = array('Company','URL');
	$user_name = str_ireplace("optin_","",$temp);
	$campname = str_ireplace(" ","-",$_GET["campname"]);
	$catname = str_ireplace(" ","-",$_GET["campcat"]);
	$folder_name = "../optin_db_folder";
	$campnameplain = $campname.'-'.$catname;
	$file_name_plain = $user_name."-".$campname."-".$catname.".csv";
	$file_name = $folder_name."/".$user_name."-".$campname."-".$catname.".csv";
	$_SESSION["optin_user_file"] =  $file_name_plain;
	$checkcamp = checkcamp($table_name, $campnameplain ,$file_name_plain, $user_name);
	if(!$checkcamp){
		createcamp($table_name, $campnameplain, $folder_name, $file_name_plain, $user_name, $date);
		if(!(file_exists($folder_name))) {    
		mkdir($folder_name, 0777);
			if (!(file_exists($file_name))) {
				$fh = fopen($file_name, 'w+');
				fputcsv($fh, $line, ',');
				fclose($fh);
				
			}
		}else{
			if (!(file_exists($file_name))) {  
					$fh = fopen($file_name, 'w+');
					fputcsv($fh, $line, ',');
					fclose($fh);
				}
		}
		echo "Campagin Created Sucessfully ^*";
	}else{
		echo "Sorry Campagin Exists";
		die;
	}
	
}else{
	echo "no session";
}
?>