<?php
session_start();
if (isset($_SESSION["optin_user"])){
	$temp = $_SESSION["optin_user"];
	$user_name = str_ireplace("optin_","",$temp);
	$campname = str_ireplace(" ","",$_GET["campname"]);
	$catname = str_ireplace(" ","",$_GET["campcat"]);
	$folder_name = "../optin_db_folder";
	$user_CSV[1] = array('Quentin', 'Del Viento', 34);
		$user_CSV[2] = array('Antoine', 'Del Torro', 55);
		$user_CSV[3] = array('Arthur', 'Vincente', 15);
		$user_CSV2[1] = array('Quentin', 'Del Viento', 34);
		$user_CSV2[2] = array('Arthur', 'Vincente', 15);
		$user_CSV2[4] = array('Antoine', 'Del Torro', 55);
	$file_name = $folder_name."/".$user_name."_".$campname."_".$catname.".csv";
	if (!(file_exists($folder_name))) {    
		mkdir($folder_name, 0777);
		echo "File Created Sucessfully";
			if (!(file_exists($file_name))) {  
				$fh = fopen($file_name, 'w');
			foreach ($user_CSV as $line) {
			fputcsv($fh, $line, ',');
			}
			fclose($fh);
			echo $file_name."Created";
			}
	}else{
		if ((file_exists($file_name))) {
			$fh = fopen($file_name, 'a');
				foreach ($user_CSV2 as $line) {
				fputcsv($fh, $line, ',');
			}
			fclose($fh);
		}else{
			$fh = fopen($file_name, 'w');
				foreach ($user_CSV2 as $line) {
				fputcsv($fh, $line, ',');
			}
		}
		echo "Done";
	}
}else{
	echo "no session";
}
?>