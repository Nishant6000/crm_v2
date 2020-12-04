<?php
$table_name = "campaign";
include('../db/config.php');
if(isset($_GET['bulkemailtosave'])){
	$urldata = $_GET['bulkemailtosave'];
	$urldataarray = explode("|", $urldata);
	$urldataarraycnt  = count($urldataarray);
	if($urldataarraycnt != 0){
			$urldataarraydomainnameprocess = explode("@",$urldataarray[0]);
			$urldataarraydomainname = $urldataarraydomainnameprocess[1];
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
				
			$file_loc = "../optin_db_folder/".$user_name."/bulk-".$file_name;
			if (!(file_exists("../optin_db_folder/".$user_name))) {
				mkdir('../optin_db_folder/'.$user_name, 0777, true);
			}
			$line = array('Company','email');
					if ((file_exists($file_loc))) {
				$fh = fopen($file_loc, 'a');
				for($k=0;$k<$urldataarraycnt-1;$k++){
					$linedyn = array($urldataarraydomainname,$urldataarray[$k]);
					fputcsv($fh, $linedyn, ',');
				}
				fclose($fh);
				echo "</Br>";
				echo "File Saved Successfully";
				}else{
						$fh = fopen($file_loc, 'a+');
						fputcsv($fh, $line, ',');
							for($k=0;$k<$urldataarraycnt-1;$k++){
								$linedyn = array($urldataarraydomainname,$urldataarray[$k]);
								fputcsv($fh, $linedyn, ',');
							}
						fclose($fh);
						echo "</Br>";
						echo "File Created Successfully";
				}
		}
	
	
	
	
	
	
	///////////////////////////////////////////////////////////////////reference//////////////////////////////////////
	
	
	
}
?>