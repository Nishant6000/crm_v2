<?php
$table_name = "campaign";
include('../db/config.php');
if(isset($_GET['urldata'])){
	$urldata = $_GET['urldata'];
	$urldataarray = explode("|", $urldata);
	$urldataarraycnt  = count($urldataarray);
	session_start();
	$temp_user = $_SESSION["optin_user"];
	$user_name = str_ireplace("optin_","",$temp_user);
	if(isset($_SESSION['optin_user_file'])){
		 $file_name = $_SESSION['optin_user_file'];
	}else{
		$db_results = countdata_campdata_last($table_name, $user_name);
			if($db_results){
				$file_name = $db_results['filename'];
				$_SESSION['optin_user_file'] = $file_name;
				echo "No Campagin. Last Filename selected";
			}else{
				echo "You Do not Have any campagin. Please Create One";
			}
	}
	$fold_loc = "../optin_db_folder/".$user_name;
	if (!file_exists($fold_loc)) {
    mkdir($fold_loc, 0777, true);
	}

	$file_loc = $fold_loc."/mc2url-".$file_name;
	$line = array('Company','URL');
	if($urldataarraycnt == "3"){
		$line1 = array($urldataarray[0],$urldataarray[1]);
		if ((file_exists($file_loc))) {
			$fh = fopen($file_loc, 'a');
			fputcsv($fh, $line1, ',');
			fclose($fh);
			
		}else{
			$fh = fopen($file_loc, 'w');
			fputcsv($fh, $line, ',');
			fputcsv($fh, $line1, ',');
			fclose($fh);
		}
		echo "</br>";
		echo "File Created Sucessfully";
	}else if($urldataarraycnt == "5"){
		$line1 = array($urldataarray[0],$urldataarray[1]);
		$line2 = array($urldataarray[2],$urldataarray[3]);	
		if ((file_exists($file_loc))) {
			$fh = fopen($file_loc, 'a');
			fputcsv($fh, $line1, ',');
			fputcsv($fh, $line2, ',');
			fclose($fh);
			
		}else{
			$fh = fopen($file_loc, 'w');
			fputcsv($fh, $line, ',');
			fputcsv($fh, $line1, ',');
			fputcsv($fh, $line2, ',');
			fclose($fh);
		}
		echo "</br>";
		echo "File Created Sucessfully";
	}else if($urldataarraycnt == "7"){
		$line1 = array($urldataarray[0],$urldataarray[1]);
		$line2 = array($urldataarray[2],$urldataarray[3]);
		$line3 = array($urldataarray[4],$urldataarray[5]);
		if ((file_exists($file_loc))) {
			$fh = fopen($file_loc, 'a');
			fputcsv($fh, $line1, ',');
			fputcsv($fh, $line2, ',');
			fputcsv($fh, $line3, ',');
			fclose($fh);
			
		}else{
			$fh = fopen($file_loc, 'w');
			fputcsv($fh, $line, ',');
			fputcsv($fh, $line1, ',');
			fputcsv($fh, $line2, ',');
			fputcsv($fh, $line3, ',');
			fclose($fh);
		}
		echo "</br>";
		echo "File Created Sucessfully";
	}
	
}
?>