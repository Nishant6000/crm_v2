
<?php 
include("./db_v2/config.php");
require('./classes_v2/xlsxreader.php');
require('./classes_v2/class.customsearch.php');
require('./classes_v2/xlsxwriter.php');
date_default_timezone_set('America/Chicago');
$date = date('Y-m-d');
$username =  "nishanth_optin";
$mail_type = "text";
//===========================================================================
function savefile($fname, $val){
$fp = fopen($fname, 'a');
fputcsv($fp, $val);
fclose($fp);
}
//========================Get ALL Pending Task===============================
//while(1){
	$task = get_all_pending_Task($username);
	if($task){
		foreach ($task as $tas){
			if($tas["typeofsearch"] == "BULK"){// check if type of search Bulk
				$filename = $tas["fileloc"];
				$filename = str_ireplace('../','./',$filename);
				$xlsx = new XLSXReader($filename);
				$sheetNames = $xlsx->getSheetNames();
				$sheet = $xlsx->getSheet($sheetNames[1]);
				$final = $sheet->getData();
				$final_count = count($final);
				$namest = false;
				$urlcnt = 0;
				$urlfcount = 0;
				$forxlsxdata = array();
				$writer = new XLSXWriter();
				$writer->setAuthor('Optin Prospects'); 
				$kmc = 0;
				//========count if data exists else close the activity====
				if($final_count){
//========*******STARTOFBULKSEARCH******************************************************
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
//=====================================Create output excel file and csv===============================================
$filearray = explode('/',$filename);
$Output_File_Name = "abemail-".$tas["campaign_name"]."-".rand(1,100)."-".$filearray[3];
$Output_File_Loc = "./optin_db_folder_v2/".$filearray[2]."/".$Output_File_Name;
$newcsvfile = "csvabemail-".rand(1,100).".csv";
$newcsvfileloc = "./optin_db_folder_v2/".$username."/".$newcsvfile;
if (!file_exists($newcsvfileloc)) {
	$fh = fopen($newcsvfileloc, 'w');
}
$file_loc = "./optin_db_folder_v2/".$username."/".$Output_File_Name;
if (!file_exists('./optin_db_folder_v2/'.$username)) {
	mkdir('./optin_db_folder_v2/'.$username, 0777, true);
}
//=====================================Check if output file Exists==== 
if(file_exists($Output_File_Loc)){
	echo "</br>";
	echo "File Exists cannot Proceed Further. Please Create a New Campagin";
	die;
}else{
	echo "Processing File".$filearray[3].". Please wait...";	
}
for($c=0;$c<40000;$c++)echo " ";
flush();
//============================================================================

if(count($sheetNames) == 0 || count($sheetNames) == ""){
	echo "Empty File Cannot Proceed";
	for($c=0;$c<40000;$c++)echo " ";
	flush();
}else{
	// fetch total no of rows in excel
	$rowcounter =  count($final);
	$rowcount = $final[0];
	//===========================================
	foreach($rowcount as $rowcnt){
		if(stristr($rowcnt, 'url')){ // check if url feild exist in the excel file
			$namest = true;
			$urlfcount = $urlcnt;
		}else{
		}
		$urlcnt++;
	}
	if($namest){ // if everything fine Proeed
		echo "Good Url Exists!";
		$namest = false;//===========================================================================================
		//session_start();
			// write log files ======================================================
			/* if(isset($username)){
		$user_name = $username;
		$file_loc = "./test_v2/".$user_name."-all-user.txt";
		$file_loc_2 = "./test_v2/".$user_name."-all-user-data.txt";
					if (!(file_exists($file_loc))) {
					$fh = fopen($file_loc, 'a');
					$fhd = 0;
					fwrite($fh,$fhd);
					fclose($fh);
					$fh = fopen($file_loc_2, 'a');
					$fhd = "";
					fwrite($fh,$fhd);
					fclose($fh);
				}
				
			}else{
				header('location: ../index.php');
			} */
//===============================================================================
update_count($tas["sl_no"], 'percentage3', 100);
update_count($tas["sl_no"], 'percentage2', 100);
//==================================================================================
update_filename($tas["sl_no"], $newcsvfileloc);
for($i=0;$i<$rowcounter;$i++){ // starting to process file
			$rowcount = $final[$i];
			$rowtest = $rowcount[$urlfcount];
					if(!stristr($rowtest, 'url') && $rowtest != ""){
						sleep(0);
						$fh = fopen("stat.txt", 'a') or die("Failed to read file"); 
						fwrite($fh, $rowtest);
						fclose($fh);
//====================================================================================
//==========================================================================
						$c2urls = new companytourl();
								$urlp = $c2urls->get_domain($rowtest);
								$ar = "";
								$gsearch = 'EMAILS'.' '. '"@'.$urlp.'"';
								$bysearch = '[@'.$urlp.']';
								$yandex = '"@'.$urlp.'"';
								$nval = $i;
								//$results = $c2urls->fetch_google_result($gsearch,'2');
								 $results = $c2urls->fetch_google_result_via_proxy($gsearch,'2', $nval);
								if(stristr($results,"302 Moved")){ // Google Capatcha Solving
									$dom = new DOMDocument(1.0);
									@$dom->loadHTML($results);
								   foreach ($dom->getElementsByTagName('a') as $node) {
								   $caplink = $node->getAttribute('href');
								   }
								   echo "^*".$caplink."^*";
									for($z=0;$z<40000;$z++) echo ' ';
									flush();
									sleep(2);
								   $buffer = "";
								$fh = fopen($file_loc, 'r') or die("Failed to read file"); 
								$fhr = fgets($fh);
								fclose($fh);
								while($fhr != 1){
									sleep(2);
									$fh = fopen($file_loc, 'r') or die("Failed to read file"); 
									$fhr = fgets($fh);
									fclose($fh);
								}
								$handle = fopen($file_loc_2, 'r') or die("Failed to read file"); 
								if($handle){
									while (!feof($handle)) {
									$gssrcap = fgets($handle, 4096);
									$buffer .= $gssrcap;
									// Process buffer here..
									}
								}
								//echo "dONE";
								sleep(1);
								$results = $buffer;
								$fh = fopen($file_loc, 'w') or die("Failed to read file"); 
								$txt2 = "0";
								fwrite($fh, $txt2);
								fclose($fh);
								
								}
								///===========================================================Google Capatcha Solving End For Bulk Search
							$ar .= strip_tags($results);
							$resultsb = $c2urls->fetch_bing_result($bysearch);
							$ar .= strip_tags($resultsb);
							//$resultsd = $c2urls->fetch_yandex_result($yandex);
							//$ar .= strip_tags($resultsd);
							$emails = $c2urls->extract_emails_from($ar,$urlp);
							//echo $emails;
							$email_array = explode("</br>",$emails);
							echo $patern_check_array_count = count($email_array);
								for($k=0;$k<$patern_check_array_count;$k++){
									if($kmc == 0){
										$forxlsxdata[$kmc] = array('Url','Email');
										savefile($newcsvfileloc, $forxlsxdata[$kmc]);// newly added
									}else{
										if($email_array[$k-1] != null){
										$forxlsxdata[$kmc] = array($rowtest,$email_array[$k-1]);
										savefile($newcsvfileloc, $forxlsxdata[$kmc]);// newly added 
										}
									}
									$kmc++;
								}
					
							
					}else{
						
					}
			sleep(1);
			update_count($tas["sl_no"],'email_gathering', $nval);
			//update Percentage
			$final_count2 = $final_count - 1;
			$per = ($nval / $final_count2)*100;
			update_count($tas["sl_no"],'percentage1', $per);
		}
//===================================================================================		
		if (!file_exists($Output_File_Loc)) {
			foreach($forxlsxdata as $row){
			$writer->writeSheetRow('Sheet1', $row);
			}		
		} else {
			$msg = "Excel File Exist, Download CSV File";
			update_error_msg($tas["sl_no"], $msg, 2);
			
		}
$writer->writeToFile($Output_File_Loc);
echo "Saved To File";
//===Store Success in Database======================================
update_success_msg($tas["sl_no"], "Data Saved Successfully", 1);
update_filename($tas["sl_no"], $Output_File_Loc);
//===============================================
	}else{
		$namest = false;
		$msg = "Excel File without Url Cannot Be Used. Please Upload a new File";
		update_error_msg($tas["sl_no"], $msg, 2);
		//update error msg;
	}
}
//============*****ENDOFBULK***********************************
				}else{
					// update database with error report of invalid file type
					$msg = "Empty Excel File";
					update_error_msg($tas["sl_no"], $msg, 2);// stored error msg and stopped
				}
				//=============Bulk Search Process============
			}else if($tas["typeofsearch"] == "MAILVAL"){
				$filename = $tas["fileloc"];
			}else if($tas["typeofsearch"] == "CTOURL"){
				$filename = $tas["fileloc"];
			}else if($tas["typeofsearch"] == "CUSTOM"){
				$filename = $tas["fileloc"];
			}
		}
		die;
	}
//}


//=================================================================

?>
